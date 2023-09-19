var cal = {
  // (A) PROPERTIES
  mon: false, // monday first
  events: null, // events data for current month/year
  sMth: 0,
  sYear: 0, // selected month & year
  hMth: null,
  hYear: null, // html month & year
  hCD: null,
  hCB: null, // html calendar days & body
  // html form & fields
  hFormWrap: null,
  hForm: null,
  hfID: null,
  hfStart: null,
  hfEnd: null,
  hfTxt: null,
  hfColor: null,
  hfBG: null,
  hfDel: null,

  // (B) SUPPORT FUNCTION - AJAX FETCH
  ajax: (data, onload) => {
    // (B1) FORM DATA
    let form = new FormData();
    for (let [k, v] of Object.entries(data)) {
      form.append(k, v);
    }

    // (B2) FETCH data from input  here ==============================================
    // Fetch data from the first PHP file
    fetch("3-cal-ajax.php", {
        method: "POST",
        body: form
      })
      .then(res => res.text())
      .then(txt => onload(txt))
      .catch(err => console.error(err));


  },

  // (C) INIT CALENDAR
  init: () => {
    // (C1) GET HTML ELEMENTS
    cal.hMth = document.getElementById("calMonth");
    cal.hYear = document.getElementById("calYear");
    cal.hCD = document.getElementById("calDays");
    cal.hCB = document.getElementById("calBody");
    cal.hFormWrap = document.getElementById("calForm");
    cal.hForm = cal.hFormWrap.querySelector("form");
    cal.hfID = document.getElementById("evtID");
    cal.hfCategory = document.getElementById("evtCategory");
    cal.hfRequestor = document.getElementById('evtRequestor');
    cal.hfStart = document.getElementById("evtStart");

    cal.hfEnd = document.getElementById("evtEnd");
    cal.hfEndAll = document.getElementById("evtEndAll");

    cal.hfEnd1 = document.getElementById("evtEnd1");
    cal.hfEnd2 = document.getElementById("evtEnd2");
    cal.hfEnd3 = document.getElementById("evtEnd3");
    cal.hfEnd4 = document.getElementById("evtEnd4");
    cal.hfEnd5 = document.getElementById("evtEnd5");
    cal.hfEnd6 = document.getElementById("evtEnd6");
    cal.hfEnd7 = document.getElementById("evtEnd7");
    cal.hfEnd8 = document.getElementById("evtEnd8");
    cal.hfEnd9 = document.getElementById("evtEnd9");
    cal.hfEnd10 = document.getElementById("evtEnd10");
    cal.hfEnd11 = document.getElementById("evtEnd11");
    cal.hfEnd12 = document.getElementById("evtEnd12");

    cal.hfTxt = document.getElementById("evtTxt");
    cal.hfColor = document.getElementById("evtColor");
    cal.hfBG = document.getElementById("evtBG");
    cal.hfDel = document.getElementById("evtDel");

    cal.hfQuantity = document.getElementById("evtQuantity");

    cal.hfProjector = document.getElementById("evtProjector");
    cal.hfWhiteboard = document.getElementById("evtWhiteboard");
    cal.hfExtCord = document.getElementById("evtExtCord");
    cal.hfSound = document.getElementById("evtSound");
    cal.hfSoundSimple = document.getElementById("evtSoundSimple");
    cal.hfSoundAdvance = document.getElementById("evtSoundAdvance");
    cal.hfBasicLights = document.getElementById("evtBasicLights");
    cal.hfCleanup = document.getElementById("evtCleanup");
    cal.hfCleanupBefore = document.getElementById("evtCleanupBefore");
    cal.hfCleanupAfter = document.getElementById("evtCleanupAfter");

    // time
    cal.hfAllday = document.getElementById("evtTime");
    cal.hfRoomOrientation = document.getElementById("evtRoomOrientation");

    // (C2) ATTACH CONTROLS
    cal.hMth.onchange = cal.load;
    cal.hYear.onchange = cal.load;
    document.getElementById("calBack").onclick = () => cal.pshift();
    document.getElementById("calNext").onclick = () => cal.pshift(1);
    document.getElementById("calAdd").onclick = () => cal.show();
    cal.hForm.onsubmit = () => cal.save();
    document.getElementById("evtCX").onclick = () => cal.hFormWrap.close();
    cal.hfDel.onclick = cal.del;

    // (C3) DRAW DAY NAMES
    let days = ["MON", "TUE", "WED", "THU", "FRI", "SAT"];

    if (cal.mon) {
      days.push("Sunday");
    } else {
      days.unshift("SUN");
    }
    for (let d of days) {
      let cell = document.createElement("div");
      cell.className = "calCell";
      cell.innerHTML = d;
      cal.hCD.appendChild(cell);
    }

    // (C4) LOAD & DRAW CALENDAR
    cal.load();
  },

  // (D) SHIFT CURRENT PERIOD BY 1 MONTH
  pshift: forward => {
    cal.sMth = parseInt(cal.hMth.value);
    cal.sYear = parseInt(cal.hYear.value);
    if (forward) {
      cal.sMth++;
    } else {
      cal.sMth--;
    }
    if (cal.sMth > 12) {
      cal.sMth = 1;
      cal.sYear++;
    }
    if (cal.sMth < 1) {
      cal.sMth = 12;
      cal.sYear--;
    }
    cal.hMth.value = cal.sMth;
    cal.hYear.value = cal.sYear;
    cal.load();
  },

  // (E) LOAD EVENTS
  load: () => {
    cal.sMth = parseInt(cal.hMth.value);
    cal.sYear = parseInt(cal.hYear.value);
    cal.ajax({
      req: "get",
      month: cal.sMth,
      year: cal.sYear
    }, events => {
      cal.events = JSON.parse(events);
      cal.draw();
    });
  },

  // (F) DRAW CALENDAR
  draw: () => {
    // (F1) CALCULATE DAY MONTH YEAR
    // note - jan is 0 & dec is 11 in js
    // note - sun is 0 & sat is 6 in js
    let daysInMth = new Date(cal.sYear, cal.sMth, 0).getDate(), // number of days in selected month
      startDay = new Date(cal.sYear, cal.sMth - 1, 1).getDay(), // first day of the month
      endDay = new Date(cal.sYear, cal.sMth - 1, daysInMth).getDay(), // last day of the month
      now = new Date(), // current date
      nowMth = now.getMonth() + 1, // current month
      nowYear = parseInt(now.getFullYear()), // current year
      nowDay = cal.sMth == nowMth && cal.sYear == nowYear ? now.getDate() : null;

    // (F2) DRAW CALENDAR ROWS & CELLS
    // (F2-1) INIT + HELPER FUNCTIONS
    let rowA, rowB, rowC, rowMap = {},
      rowNum = 1,
      cell, cellNum = 1,
      rower = () => {
        rowA = document.createElement("div");
        rowB = document.createElement("div");
        rowC = document.createElement("div");
        rowA.className = "calRow";
        rowA.id = "calRow" + rowNum;
        rowB.className = "calRowHead";
        rowC.className = "calRowBack";
        cal.hCB.appendChild(rowA);
        rowA.appendChild(rowB);
        rowA.appendChild(rowC);
      },
      celler = day => {
        cell = document.createElement("div");
        cell.className = "calCell";
        if (day) {
          cell.innerHTML = day;
        }
        rowB.appendChild(cell);
        cell = document.createElement("div");
        cell.className = "calCell";
        if (day === undefined) {
          cell.classList.add("calBlank");
        }
        if (day !== undefined && day == nowDay) {
          cell.classList.add("calToday");
        }
        rowC.appendChild(cell);
      };
    cal.hCB.innerHTML = "";
    rower();

    // (F2-2) BLANK CELLS BEFORE START OF MONTH
    if (cal.mon && startDay != 1) {
      let blanks = startDay == 0 ? 7 : startDay;
      for (let i = 1; i < blanks; i++) {
        celler();
        cellNum++;
      }
    }
    if (!cal.mon && startDay != 0) {
      for (let i = 0; i < startDay; i++) {
        celler();
        cellNum++;
      }
    }

    // (F2-3) DAYS OF THE MONTH
    for (let i = 1; i <= daysInMth; i++) {
      rowMap[i] = {
        r: rowNum,
        c: cellNum
      };
      celler(i);
      if (i != daysInMth && cellNum % 7 == 0) {
        rowNum++;
        rower();
      }
      cellNum++;
    }

    // (F2-4) BLANK CELLS AFTER END OF MONTH
    if (cal.mon && endDay != 0) {
      let blanks = endDay == 6 ? 1 : 7 - endDay;
      for (let i = 0; i < blanks; i++) {
        celler();
        cellNum++;
      }
    }
    if (!cal.mon && endDay != 6) {
      let blanks = endDay == 0 ? 6 : 6 - endDay;
      for (let i = 0; i < blanks; i++) {
        celler();
        cellNum++;
      }
    }

    // (F3) DRAW EVENTS
    if (cal.events !== false) {
      for (let [id, evt] of Object.entries(cal.events)) {
        // (F3-1) EVENT START & END DAY
        let sd = new Date(evt.s),
          ed = new Date(evt.e);
        if (sd.getFullYear() != cal.sYear) {
          sd = 1;
        } else {
          sd = sd.getMonth() + 1 < cal.sMth ? 1 : sd.getDate();
        }
        if (ed.getFullYear() != cal.sYear) {
          ed = daysInMth;
        } else {
          ed = ed.getMonth() + 1 > cal.sMth ? daysInMth : ed.getDate();
        }

        // (F3-2) "MAP" ONTO HTML CALENDAR
        cell = {};
        rowNum = 0;
        for (let i = sd; i <= ed; i++) {
          if (rowNum != rowMap[i]["r"]) {
            cell[rowMap[i]["r"]] = {
              s: rowMap[i]["c"],
              e: 0
            };
            rowNum = rowMap[i]["r"];
          }
          if (cell[rowNum]) {
            cell[rowNum]["e"] = rowMap[i]["c"];
          }
        }

        // (F3-3) DRAW HTML EVENT ROW
        for (let [r, c] of Object.entries(cell)) {
          let o = c.s - 1 - ((r - 1) * 7), // event cell offset
            w = c.e - c.s + 1; // event cell width
          rowA = document.getElementById("calRow" + r);
          rowB = document.createElement("div");
          rowB.className = "calRowEvt";


          if (cal.hfCategory.value = cal.events[id]["category"] === "ADMIN") {
            rowB.innerHTML = cal.events[id]["t"] + " - " + cal.events[id]["fullname"];
           cal.events[id]["t"] + cal.events[id]["fullname"]; //Requestor's Name
          } 
          else if (cal.hfCategory.value = cal.events[id]["userCategory"] === "USER" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
            rowB.innerHTML = cal.events[id]["t"] + " - " + cal.events[id]["firstname"] + " " + cal.events[id]["lastname"];
          } 
          else {
            rowB.style.display = "none";
          }
















          var eventData = cal.events[id]; // Replace 'id' with the actual event ID

          // Replace the hard-coded key "x56" with the event-specific key
          var eventTimeKey = "x56"; // Replace this with the actual key from your event data

          // Sample raw time data in your PHP array
          var rawTimeData = {
            "x67": "6am to 7am",
            "x78": "7am to 8am",
            "x89": "8am to 9am",
            "x910": "9am to 10am",
            "x1011": "10am to 11am",
            "x1112": "11am to 12pm",
            "x121": "12pm to 1pm",
            "x12": "1pm to 2pm",
            "x23": "2pm to 3pm",
            "x34": "3pm to 4pm",
            "x45": "4pm to 5pm",
            "x56": "5pm to 6pm"
          };

          // Convert and format the time data for the event-specific key
          var rawTime = rawTimeData[eventTimeKey];

          var times = rawTime.split(" to ");
          var startTime = times[0];
          var endTime = times[1];

          // You can format the time as needed, for example:
          // 6am to 7am => 06:00 AM - 07:00 AM
          // Format hours and minutes as needed
          var formattedStartTime = startTime.replace("am", "AM").replace("pm", "PM");
          var formattedEndTime = endTime.replace("am", "AM").replace("pm", "PM");

          // Create a formatted time string
          var formattedTime = formattedStartTime + " - " + formattedEndTime;

          // rowB.innerHTML = cal.events[id]["t"] + " - " + formattedTime;













          rowB.style.color = cal.events[id]["c"];
          rowB.style.backgroundColor = cal.events[id]["b"];
          rowB.classList.add("w" + w);
          if (o != 0) {
            rowB.classList.add("o" + o);
          }
          rowB.onclick = () => cal.show(id);
          rowA.appendChild(rowB);
        }
      }
    }
  },

  // (G) SHOW EVENT FORM
  show: id => {
    if (id) {
      cal.hfID.value = id;


      cal.hfStart.value = cal.events[id]["s"]; //Start Time
      cal.hfEnd.value = cal.events[id]["e"]; //End Time
      if (cal.hfCategory.value = cal.events[id]["category"] === "ADMIN") {
        cal.hfRequestor.value = cal.events[id]["fullname"]; //Requestor's Name
      } 
      if (cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"] && cal.events[id]["category"] === "USER") {
        cal.hfRequestor.value = cal.events[id]["firstname"] + " " + cal.events[id]["lastname"]; //Requestor's Name
      }

      // Time
      if (cal.hfEnd1.value = cal.events[id]["x67"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd1.value = "6AM to 7AM";
      } else {
        cal.hfEnd1.value = "";
      }
      if (cal.hfEnd2.value = cal.events[id]["x78"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd2.value = "7AM to 8AM";
      } else {
        cal.hfEnd2.value = "";
      }
      if (cal.hfEnd3.value = cal.events[id]["x89"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd3.value = "8AM to 9AM";
      } else {
        cal.hfEnd3.value = "";
      }
      if (cal.hfEnd4.value = cal.events[id]["x910"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd4.value = "9AM to 10AM";
      } else {
        cal.hfEnd4.value = "";
      }
      if (cal.hfEnd5.value = cal.events[id]["x1011"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd5.value = "10AM to 11AM";
      } else {
        cal.hfEnd5.value = "";
      }
      if (cal.hfEnd6.value = cal.events[id]["x1112"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd6.value = "11AM to 12PM";
      } else {
        cal.hfEnd6.value = "";
      }
      if (cal.hfEnd7.value = cal.events[id]["x121"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd7.value = "12PM to 1PM";
      } else {
        cal.hfEnd7.value = "";
      }
      if (cal.hfEnd8.value = cal.events[id]["x12"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd8.value = "1PM to 2PM";
      } else {
        cal.hfEnd8.value = "";
      }
      if (cal.hfEnd9.value = cal.events[id]["x23"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd9.value = "2PM to 3PM";
      } else {
        cal.hfEnd9.value = "";
      }
      if (cal.hfEnd10.value = cal.events[id]["x34"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd10.value = "3PM to 4PM";
      } else {
        cal.hfEnd10.value = "";
      }
      if (cal.hfEnd11.value = cal.events[id]["x45"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd11.value = "4PM to 5PM";
      } else {
        cal.hfEnd11.value = "";
      }
      if (cal.hfEnd12.value = cal.events[id]["x56"] === "1" && cal.events[id]["userID"] === cal.events[id]["userIDSESSION"] && cal.events[id]["username"] === cal.events[id]["username"]) {
        cal.hfEnd12.value = "5PM to 6PM";
      } else {
        cal.hfEnd12.value = "";
      }
      if (cal.events[id]["x67"] === "1" &&
        cal.events[id]["x78"] === "1" &&
        cal.events[id]["x89"] === "1" &&
        cal.events[id]["x910"] === "1" &&
        cal.events[id]["x1011"] === "1" &&
        cal.events[id]["x1112"] === "1" &&
        cal.events[id]["x121"] === "1" &&
        cal.events[id]["x12"] === "1" &&
        cal.events[id]["x23"] === "1" &&
        cal.events[id]["x34"] === "1" &&
        cal.events[id]["x45"] === "1" &&
        cal.events[id]["x56"] === "1") {
        cal.hfEndAll.value = "All Day";
      } else {
        cal.hfEndAll.value = "";
      }


      cal.hfTxt.value = cal.events[id]["t"]; // Room Name
      cal.hfQuantity.value = cal.events[id]["q"]; //Quantity
      // EQUIPMENTS
      // Projector
      if (cal.events[id]["projector"] === "1") {
        cal.hfProjector.value = "Projector";
      } else {
        cal.hfProjector.value = "";
      }

      // Whiteboard
      if (cal.events[id]["whiteboard"] === "1") {
        cal.hfWhiteboard.value = "Whiteboard";
      } else {
        cal.hfWhiteboard.value = "";
      }

      // Extension Cord
      if (cal.events[id]["ext_cord"] === "1") {
        cal.hfExtCord.value = "Extension Cord";
      } else {
        cal.hfExtCord.value = "";
      }

      // Sound
      if (cal.events[id]["sound"] === "sound" && cal.events[id]["sound_simple"] === "1") {
        cal.hfSound.value = "Sound (Simple)";
      } else if (cal.events[id]["sound"] === "sound" && cal.events[id]["sound_advance"] === "1") {
        cal.hfSound.value = "Sound (Advance)";
      } else {
        cal.hfSound.value = "";
      }

      // Basic Lights
      if (cal.events[id]["basic_lights"] === "1") {
        cal.hfBasicLights.value = "Basic Lights";
      } else {
        cal.hfBasicLights.value = "";
      }

      // Cleanup
      if (cal.events[id]["cleanup"] === "cleanup" && cal.events[id]["cleanup_before"] === "1") {
        cal.hfCleanup.value = "Cleanup (Before)";
      } else if (cal.events[id]["cleanup"] === "cleanup" && cal.events[id]["cleanup_after"] === "1") {
        cal.hfCleanup.value = "Cleanup (After)";
      } else {
        cal.hfCleanup.value = "";
      }

      cal.hfRoomOrientation.value = cal.events[id]["room_orientation"]; //Room Orientation
      cal.hfCategory.value = cal.events[id]["userCategory"];
      cal.hfColor.value = cal.events[id]["c"];
      cal.hfBG.value = cal.events[id]["b"];
      cal.hfDel.style.display = "inline-block";

    } else {
      cal.hForm.reset();
      cal.hfID.value = "";
      cal.hfDel.style.display = "none";
    }
    cal.hFormWrap.show();
  },






  // (H) SAVE EVENT
  save: () => {
    // (H1) COLLECT DATA
    var data = {
      req: "save",
      start: cal.hfStart.value,
      end: cal.hfEnd.value,
      txt: cal.hfTxt.value,
      color: cal.hfColor.value,
      bg: cal.hfBG.value
    };
    if (cal.hfID.value != "") {
      data.id = cal.hfID.value;
    }

    // (H2) Create a confirmation SweetAlert dialog
    Swal.fire({
      title: 'Confirm Save',
      text: 'Are you sure you want to approve this event?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, approve it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        // User confirmed the save action
        // (H3) AJAX SAVE
        cal.ajax(data, res => {
          if (res == "OK") {
            Swal.fire(
              'Saved!',
              'Your event has been saved.',
              'success'
            ).then(() => {
              cal.hFormWrap.close();
              cal.load();
            });
          } else {
            Swal.fire(
              'Error',
              res,
              'error'
            );
          }
        });
      }
    });

    return false;
  },



  // (I) DELETE EVENT
  del: () => {
    var data = {
      req: "del",
      bg: cal.hfBG.value
    };
    if (cal.hfID.value != "") {
      data.id = cal.hfID.value;
    }

    // Define custom CSS class for the SweetAlert dialog
    const customClass = {
      container: 'custom-swal-container',
      popup: 'custom-swal-popup',
      header: 'custom-swal-header',
      title: 'custom-swal-title',
      closeButton: 'custom-swal-closeButton',
      content: 'custom-swal-content',
      actions: 'custom-swal-actions',
      confirmButton: 'custom-swal-confirmButton',
      cancelButton: 'custom-swal-cancelButton',
    };

    // Display a SweetAlert confirmation dialog with custom size
    Swal.fire({
      title: 'Are you sure?',
      text: 'You won\'t be able to revert this!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, reject it!',
      customClass: customClass // Apply custom CSS class
    }).then((result) => {
      if (result.isConfirmed) {
        // User clicked the "Yes, delete it!" button
        cal.ajax(data, res => {
          if (res == "OK") {
            cal.hFormWrap.close();
            cal.load();
          } else {
            Swal.fire(
              'Error',
              res,
              'error'
            );
          }
        });
      }
    });

    return false;
  }






};
window.onload = cal.init;