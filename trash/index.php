<?php
include("connect.php");
session_start();
date_default_timezone_set('Asia/Hong_Kong');
$date = date('D : F d, Y');
$date1 = date('Y-m-d');


if (isset($_POST['verify'])) {
  echo $date1;
}

if (isset($_POST['SubButton'])) {

  $ireserver = "Deo Villavicencio";
  $evtStart = $_POST['evtStart'];
  $evtEnd = $_POST['evtStart'];
  $roomko = $_POST['roomko'];
  $qty = $_POST['qty'];
  $room_orientation = $_POST['roomOrientation'];

  $others_rem = $_POST['others_rem'];
  $status = "pending";

  if (isset($_POST['cprojector'])) {
    $cprojector = 1;
  } else {
    $cprojector = 0;
  }

  if (isset($_POST['cwhiteboard'])) {
    $cwhiteboard = 1;
  } else {
    $cwhiteboard = 0;
  }

  if (isset($_POST['cextn'])) {
    $cextn = 1;
  } else {
    $cextn = 0;
  }

  if (isset($_POST['radios'])) {
    $radios = 1;
  } else {
    $radios = 0;
  }

  if (isset($_POST['radioa'])) {
    $radioa = 1;
  } else {
    $radioa = 0;
  }

  if (isset($_POST['basicl'])) {
    $basicl = 1;
  } else {
    $basicl = 0;
  }

  if (isset($_POST['c_before'])) {
    $c_before = 1;
  } else {
    $c_before = 0;
  }

  if (isset($_POST['c_after'])) {
    $c_after = 1;
  } else {
    $c_after = 0;
  }



  if (isset($_POST['c_allday'])) {
    // // Checkbox is selected
    // echo "c_allday selected";
    $c_alldayv = $ireserver;

    $x67v = $ireserver;
    $x78v = $ireserver;
    $x89v = $ireserver;
    $x910v = $ireserver;
    $x1011v = $ireserver;
    $x1112v = $ireserver;
    $x121v = $ireserver;
    $x12v = $ireserver;
    $x23v = $ireserver;
    $x34v = $ireserver;
    $x45v = $ireserver;
    $x56v = $ireserver;
  } else {
    $c_alldayv = "x";
  }



  if (isset($_POST['c67'])) {
    $start_t = "6am";
  } else if (!isset($_POST['c67']) && (isset($_POST['c78']))) {
    $start_t = "7am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (isset($_POST['c89'])))) {
    $start_t = "8am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (isset($_POST['c910'])))) {
    $start_t = "9am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (isset($_POST['c1011'])))) {
    $start_t = "10am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (isset($_POST['c1112'])))) {
    $start_t = "11am";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (isset($_POST['c121'])))) {
    $start_t = "12nn";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (isset($_POST['c12'])))) {
    $start_t = "1pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (isset($_POST['c23'])))) {
    $start_t = "2pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (isset($_POST['c34'])))) {
    $start_t = "3pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (isset($_POST['c45'])))) {
    $start_t = "4pm";
  } else if (!isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (isset($_POST['c56'])))) {
    $start_t = "5pm";
  }




  if (isset($_POST['c56'])) {
    $end_t = "6pm";
  } else if ((isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "5pm";
  } else if ((isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "4pm";
  } else if ((isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "3pm";
  } else if ((isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "2pm";
  } else if ((isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "1pm";
  } else if ((isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "12nn";
  } else if ((isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "11am";
  } else if ((isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "10am";
  } else if ((isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56']))) {
    $end_t = "9am";
  } else if ((isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56'])))) {
    $end_t = "8am";
  } else if (isset($_POST['c67']) && (!isset($_POST['c78']) && (!isset($_POST['c89']))  && (!isset($_POST['c910'])) && (!isset($_POST['c1011'])) && (!isset($_POST['c1112'])) && (!isset($_POST['c121'])) && (!isset($_POST['c12'])) && (!isset($_POST['c23'])) && (!isset($_POST['c34'])) && (!isset($_POST['c45'])) && (!isset($_POST['c56'])))) {
    $end_t = "7am";
  }

  if (isset($_POST['c67'])) {
    $x67v = $ireserver;
  } else {
    $x67v = "";
  }


  if (isset($_POST['c78'])) {
    $x78v = $ireserver;
  } else {
    $x78v = "";
  }

  if (isset($_POST['c89'])) {
    $x89v = $ireserver;
  } else {
    $x89v = "";
  }

  if (isset($_POST['c910'])) {
    $x910v = $ireserver;
  } else {
    $x910v = "";
  }

  if (isset($_POST['c1011'])) {
    $x1011v = $ireserver;
  } else {
    $x1011v = "";
  }

  if (isset($_POST['c1112'])) {
    $x1112v = $ireserver;
  } else {
    $x1112v = "";
  }

  if (isset($_POST['c121'])) {
    $x121v = $ireserver;
  } else {
    $x121v = "";
  }


  if (isset($_POST['c12'])) {
    $x12v = $ireserver;
  } else {
    $x12v = "";
  }

  if (isset($_POST['c23'])) {
    $x23v = $ireserver;
  } else {
    $x23v = "";
  }

  if (isset($_POST['c34'])) {
    $x34v = $ireserver;
  } else {
    $x34v = "";
  }

  if (isset($_POST['c45'])) {
    $x45v = $ireserver;
  } else {
    $x45v = "";
  }

  if (isset($_POST['c56'])) {
    $x56v = $ireserver;
  } else {
    $x56v = "";
  }


  // //echo $evtStart;
  // echo $start_t;
  // echo $end_t;


  //for time
  $string_to_date = $d = strtotime($evtStart);
  $new_date = Date('H:i a', $string_to_date);


  // Get the next available column number
  $nextColumnNumber = 1;
  $sql = "SELECT MAX(columnNumber) AS maxColumnNumber FROM events";
  $result = mysqli_query($connect, $sql);

  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $nextColumnNumber = $row["maxColumnNumber"] + 1;
    } else {
      // Handle the case where there are no rows in the result set
      $nextColumnNumber = 1; // Or any other default value you want to set
    }
  } else {
    // Handle the case where the query failed
    $nextColumnNumber = -1; // Or any other default value indicating a failure
  }

  // $sql = "SELECT * FROM events WHERE (x67 = '$x67v' OR x78 = '$x78v' OR x89 = '$x89v' OR x910 = '$x910v' 
  //         OR x1011 = '$x1011v' OR x1112 = '$x1112v' OR x121 = '$x121v' OR x12 = '$x12v' OR x23 = '$x23v' 
  //         OR x34 = '$x34v' OR x45 = '$x45v' OR x56 = '$x56v') AND evt_start = '$evtStart'";

  // Check if there is existing data for the specified date in any of the columns
  $sql = "SELECT COUNT(*) AS existingDataCount FROM events WHERE 
          (x67 = '$x67v' AND x78 = '$x78v' AND x89 = '$x89v' AND x910 = '$x910v' 
          AND x1011 = '$x1011v' AND x1112 = '$x1112v' AND x121 = '$x121v' 
          AND x12 = '$x12v' AND x23 = '$x23v' AND x34 = '$x34v' AND x45 = '$x45v' 
          AND x56 = '$x56v') AND evt_start = '$evtStart'";

  $result = mysqli_query($connect, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $existingDataCount = $row["existingDataCount"];

    echo "Existing Data Count: $existingDataCount"; // Debugging line

    if ($existingDataCount > 0) {
      // Data already exists for the specified date in one of the columns, do not insert
      // You can return an error message or handle it accordingly
      echo "Data already exists for the specified date in one of the columns.";
    } else {
      // No existing data, proceed with the insertion
      $query = "INSERT INTO events (
          evt_start, evt_end, evt_text, evt_color, evt_bg, qty, projector, whiteboard, ext_cord, sound, sound_simple, sound_advance, basic_lights,
          cleanup, cleanup_before, cleanup_after, others, others1, allday, x67, x78, x89, x910, x1011, x1112, x121, x12, x23, x34, x45, x56, room_orientation, status
        ) VALUES (
          '$evtStart', '$evtEnd', '$roomko', '#000000', '#fbff00', '$qty', '$cprojector', '$cwhiteboard', '$cextn', 'sound', '$radios', '$radioa', '$basicl',
          'cleanup', '$c_before', '$c_after', 'others', '$others_rem', '$c_alldayv', '$x67v', '$x78v', '$x89v', '$x910v', '$x1011v', '$x1112v', '$x121v', '$x12v', '$x23v', '$x34v', '$x45v', '$x56v', '$room_orientation', '$status'
        )";

      $result = mysqli_query($connect, $query);

      if (!$result) {
        // Handle the case where the insertion query failed
        echo "Insertion failed.";
      }
    }
  } else {
    // Handle the case where the query to check existing data failed
    $nextColumnNumber = -1; // Or any other default value indicating a failure
  }



  //  if(mysqli_num_rows($result) > 0){
  //   $sql = "INSERT INTO events (column$nextColumnNumber, evt_start) VALUES ('$x910v', '$evtStart')";
  //   $connect->query($sql);
  //  }else{
  // Try


  //     mysql_query("INSERT INTO events
  //       (evt_start, evt_end, evt_text, evt_color, evt_bg,qty,projector,whiteboard,ext_cord,sound,sound_simple,sound_advance,basic_lights,
  //       cleanup,cleanup_before,cleanup_after,others,others1,allday,x67,x78,x89,x910,x1011,x1112,x121,x12,x23,x34,x45,x56,room_orientation,status)
  //       VALUES
  //       ('$evtStart','$evtEnd','$roomko','#000000','#fbff00','$qty','$cprojector','$cwhiteboard','$cextn','sound','$radios','$radioa','$basicl',
  //       'cleanup','$c_before','$c_after','others','$others_rem','$c_alldayv','$x67v','$x78v','$x89v','$x910v','$x1011v','$x1112v','$x121v','$x12v','$x23v','$x34v','$x45v','$x56v','$room_orientation','$status')
  //       ");


  //   // insert more data to locationpo table for date and location monitoring

  //   $resultE = mysql_query("select * from locationpo WHERE evt_text = '$roomko'  and evt_start='$evtStart'");
  //   if (mysql_num_rows($resultE) == 0) {
  //     // kapag walang  kaparehas
  //     mysql_query("INSERT INTO locationpo
  // (evt_start, evt_text, evt_color,qty,allday,x67,x78,x89,x910,x1011,x1112,x121,x12,x23,x34,x45,x56)
  // VALUES
  // ('$evtStart','$roomko','#000000','$qty','$c_alldayv','$x67v','$x78v','$x89v','$x910v','$x1011v','$x1112v','$x121v','$x12v','$x23v','$x34v','$x45v','$x56v')
  // ");
  //   } else {

  //     while ($rowE = mysql_fetch_row($resultE))
  //       if ($rowE[1]) {
  //       }


  //     $query = mysql_query("UPDATE locationpo
  //       SET
  //       x67='$x67v',
  //       x78='$x78v',
  //       x89='$x89v',
  //       x910='$x910v',
  //       x1011='$x1011v',
  //       x1112='$x1112v',
  //       x121='$x121v',
  //       x12='$x12v',
  //       x23='$x23v',
  //       x34='$x34v',
  //       x45='$x45v',
  //       x56='$x56v'

  //     WHERE evt_start = '$evtStart' and evt_text = '$roomko'
  //     ");
  //   }
}

?>


<!-- HTML Start here -->
<!DOCTYPE html>
<html>

<head>
  <title>Calendar</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.5">
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- ANDROID + CHROME + APPLE + WINDOWS APP -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="theme-color" content="white">
  <!--<link rel="apple-touch-icon" href="icon-512.png">-->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Calendar">
  <!--<meta name="msapplication-TileImage" content="icon-512.png">-->
  <meta name="msapplication-TileColor" content="#ffffff">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="strap/bootstrap.min.css">
  <script src="strap/jquery.min.js"></script>
  <script src="strap/bootstrap.min.js"></script>



  <!-- WEB APP MANIFEST -->
  <!-- https://web.dev/add-manifest/ -->
  <link rel="manifest" href="5-manifest.json">
  <link rel="shortcut icon" href="images/pcn.png" type="image/x-icon">

  <!-- SERVICE WORKER -->
  <script>
    if ("serviceWorker" in navigator) {
      navigator.serviceWorker.register("5-worker.js");
    }
  </script>

  <!-- JS + CSS -->
  <script src="4b-calendar.js"></script>
  <link rel="stylesheet" href="css/4c-calendar.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- Poppins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fontxs.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- Roboto -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>

<body>


  <?php
  // (A) DAYS MONTHS YEAR
  $months = [
    1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
    5 => "May", 6 => "June", 7 => "July", 8 => "August",
    9 => "September", 10 => "October", 11 => "November", 12 => "December"
  ];
  $monthNow = date("m");
  $yearNow = date("Y"); ?>

  <!-- (B) PERIOD SELECTOR -->
  <div id="calHead">
    <div id="calPeriod">
      <input id="calBack" type="button" class="mi" value="&lt;">
      <select id="calMonth"><?php foreach ($months as $m => $mth) {
                              printf(
                                "<option value='%u'%s>%s</option>",
                                $m,
                                $m == $monthNow ? " selected" : "",
                                $mth
                              );
                            } ?></select>
      <input id="calYear" type="number" value="<?= $yearNow ?>">
      <input id="calNext" type="button" class="mi" value="&gt;">
    </div>
    <input id="calAdd" type="button" value="+">

    <button type="button" class="gbutton btn btn-primary" data-toggle="modal" data-target="#myModal" style="float:right">Add</button>


  </div>




  <!-- (C) CALENDAR WRAPPER -->
  <div id="calWrap" style="padding:0px 10px 0px 10px ">
    <div id="calDays"></div>
    <div id="calBody"></div>
  </div>

  <!-- (D) EVENT FORM -->
  <dialog id="calForm">

    <form method="dialog">
      <div id="evtCX">X</div>
      <h2 class="evt100">CALENDAR EVENT</h2>

      <div class="evt50">
        <label>Date</label>
        <input id="evtStart" name="evtStart" type="text" disabled onclick="fwriteme()">
      </div>

      <div class="evt50">
        <input id="evtEnd" type="datetime-local" disabled style="display:none !important;">
      </div>

      <div class="evt50">
        <input id="evtColor" type="color" value="#000000" style="display:none !important;">
      </div>

      <div class="evt50">
        <input id="evtBG" type="color" value="#11ff00" style="display:none !important;">
      </div>

      <div class="evt100">
        <label>Room</label>
        <input id="evtTxt" type="text" disabled required>
      </div>

      <div class="evt100">
        <label>Quantiy</label>
        <input id="evtQuantity" type="text" disabled required>
      </div>

      <div class="evt100">
        <label>Time</label>
        <input id="evtTime" type="text" disabled required>
      </div>

      <div class="evt100">
        <label>Equipment/s</label>
        <input type="text" name="evtProjector" id="evtProjector" disabled>
        <input type="text" name="evtWhiteboard" id="evtWhiteboard" disabled>
        <input type="text" name="evtExtCord" id="evtExtCord" disabled>
        <input type="text" name="evtSound" id="evtSound" disabled>
        <input type="text" name="evtSoundSimple" id="evtSoundSimple" disabled>
        <input type="text" name="evtSoundAdvance" id="evtSoundAdvance" disabled>
        <input type="text" name="evtBasicLights" id="evtBasicLights" disabled>
        <input type="text" name="evtCleanup" id="evtCleanup" disabled>
        <input type="text" name="evtCleanupBefore" id="evtCleanupBefore" disabled>
        <input type="text" name="evtCleanupAfter" id="evtCleanupAfter" disabled>

      </div>

      <div class="evt100">
        <label for="">Room Orientation</label>
        <input type="text" name="evtRoomOrientation" id="evtRoomOrientation" disabled>
      </div>

      <div class="evt100">
        <input type="hidden" id="evtID">
        <input class="btn btn-danger" type="submit" id="evtDel" value="Delete">
        <input class="btn btn-success" type="submit" id="evtSave" value="Save">
      </div>

    </form>
  </dialog>



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Result</h4>-->
          <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModal1').modal('show');" data-dismiss="modal">
        </div>
        <div class="modal-body">
        </div>

        <div class="row">
          <div class="column">
            <div class="card">
              <h3>Select Date</h3>

              <center>
                <form action="" method="POST">
                  <div class="evt50">
                    <br>
                    <input id="evtStart" name="evtStart" type="date" onchange="checkAvailability()" required>
                  </div>
                  <br>
                  <br>
                  <button type="button" class="btn btn-warning" onclick="$('#myModalroom').modal('show');" aria-label="Close" required> Select Room </button>
                  <input type="text" name="roomko" id="roomko" class="form-control" placeholder="Place of Meeting" style="height:45px;width:250px;" required readonly>
                  <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty" style="height:45px;width:250px;" required>
              </center>

            </div>
          </div>


          <!-- Time -->
          <div class="column">
            <div class="card">
              <h3>Time</h3>
              <center>

                <label class="form-control" style="text-align:center;width:300px">
                  <input type="checkbox" name="c_allday" id="allday" onclick="fallday()" />
                  All day
                </label>

                <label class="form-control time-checkbox" data-time="67" style="text-align:center;padding-left:10px;width:250px">
                  <input type="checkbox" name="c67" id="67" onclick="falldayx('67')" />
                  6am - 7am
                </label>

                <label class="form-control time-checkbox" data-time="78" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c78" id="78" onclick="falldayx('78')" />
                  7am - 8am
                </label>

                <label class="form-control time-checkbox" data-time="89" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c89" id="89" onclick="falldayx()" />
                  8am - 9am
                </label>

                <label class="form-control time-checkbox" data-time="910" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c910" id="910" onclick="falldayx()" />
                  9am - 10am
                </label>

                <label class="form-control time-checkbox" data-time="1011" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c1011" id="1011" onclick="falldayx()" />
                  10am - 11am
                </label>

                <label class="form-control time-checkbox" data-time="1112" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c1112" id="1112" onclick="falldayx()" />
                  11am - 12nn
                </label>

                <label class="form-control time-checkbox" data-time="121" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c121" id="121" onclick="falldayx()" />
                  12nn - 1pm
                </label>

                <label class="form-control time-checkbox" data-time="12" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c12" id="12" onclick="falldayx()" />
                  1pm - 2pm
                </label>

                <label class="form-control time-checkbox" data-time="23" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c23" id="23" onclick="falldayx()" />
                  2pm - 3pm
                </label>

                <label class="form-control time-checkbox" data-time="34" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c34" id="34" onclick="falldayx()" />
                  3pm - 4pm
                </label>

                <label class="form-control time-checkbox" data-time="45" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c45" id="45" onclick="falldayx()" />
                  4pm - 5pm
                </label>

                <label class="form-control time-checkbox" data-time="56" style="text-align:center;margin-top:2px;width:250px">
                  <input type="checkbox" name="c56" id="56" onclick="falldayx()" />
                  5pm - 6pm
                </label>

              </Center>
            </div>
          </div>

          <div class="column">
            <div class="card">
              <h3>Equipment</h3>

              <center>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="cprojector" id="cprojector" />
                  Projector
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="cwhiteboard" id="cwhiteboard" />
                  Whiteboard
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="cextn" id="cextn" />
                  Extension Cord
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="checkbox" id="soundsys" onclick="fsoundsys()" />
                  Sound system
                </label>

                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="radios" id="s_simple" onclick="fsimple()" />
                  Simple
                </label>

                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="radioa" id="s_advance" onclick="fadvance()" />
                  Advanced
                </label>

                <label class="form-control" style="text-align:left;;width:300px">
                  <input type="checkbox" name="basicl" id="basicl" />
                  Basic Lights
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="checkbox" id="cleanme" onclick="fclean()" />
                  Clean Up / Disinfect
                </label>
                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="c_before" id="c_before" onclick="fbefore()" />
                  Before
                </label>

                <label class="form-control" style="margin-left:10px;text-align:left;margin-top:2px;width:200px">
                  <input type="radio" name="c_after" id="c_after" onclick="fafter()" />
                  After
                </label>

                <label class="form-control" style="text-align:left;margin-top:2px;width:300px">
                  <input type="checkbox" name="checkbox" id="equi_others" onclick="fdisplay()" />
                  Others

                  <input type="text" name="others_rem" id="others_rem" class="form-control" placeholder="Others" style="height:45px;width:250px;">
                </label>

                <br>
                <br>
              </Center>
            </div>
          </div>


          <!-- Room Orientation -->
          <div class="column">
            <div class="card">
              <h3>Room Orientation</h3>

              <center>
                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Classroom" onclick="fdisplay1x()" checked /><a href="#" onclick="$('#myModalroomClassroom').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Class Room (Tables and chairs) <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>
                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Workshop" onclick="fdisplay1x()" />
                  <a href="#" onclick="$('#myModalroomworkshop').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Workshop <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>
                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Training" onclick="fdisplay1x()" />
                  <a href="#" onclick="$('#myModalroomTraining').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Training (All Chairs) <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>
                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" value="Open" onclick="fdisplay1x()" />
                  <a href="#" onclick="$('#myModalroomOpen').modal('show');" aria-label="Close" style="display: inline; text-align: left; font-size: 1.1rem; text-decoration: none; color: #555555;">Open <u style="text-decoration: underline; font-size: .8rem;">Click Me</u> </a>

                </label>

                <label class="form-control" style="text-align:left">
                  <input type="radio" name="roomOrientation" id="room_others" onclick="fdisplay1()" onblur="fdisplay1x()" />
                  Others
                  <input type="text" name="others_rem1" id="others_rem1" class="form-control" placeholder="Others" style="height:40px;width:250px;">
                </label>
              </Center>

              <!-- Modal for Classroom Seating Setup-->
              <div class="modal fade" id="myModalroomClassroom" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomClassroom').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomClassroom').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <p style="font-weight: bold;">C L A S S R O O M </p>
                          <img src="./images/classroom.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p style="padding: 1rem; margin: 1rem 15rem; text-align: justify; text-indent: 5rem;">A classroom seating arrangements may consist of learners sitting in a circle or around a single large table. This seating arrangement can also be formed using individual desks. Learners and teachers all face one another in this setup, which can support whole-class as well as pair-wise dialogue.</p>
                        </center>
                      </center>

                    </div>

                  </div>
                </div>
              </div>


              <!-- Modal for Workshop Seating Setup-->
              <div class="modal fade" id="myModalroomworkshop" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomworkshop').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomworkshop').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <img src="./images/5-Different-styles-of-seating-arrangements.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p>Board Room</p>
                        </center>
                      </center>

                    </div>
                  </div>
                </div>
              </div>


              <!-- Modal for Training Seating Setup-->
              <div class="modal fade" id="myModalroomTraining" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomTraining').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomTraining').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <img src="./images/5-Different-styles-of-seating-arrangements.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p>Board Room</p>
                        </center>
                      </center>

                    </div>
                  </div>
                </div>
              </div>


              <!-- Modal for Open Seating Setup-->
              <div class="modal fade" id="myModalroomOpen" role="dialog">

                <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" onclick="$('#myModalroomOpen').modal('hide')">&times;</button>
                      <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px;justify-content: start;" onclick="playAudio();$('#myModalroomOpen').modal('hide')">

                    </div>

                    <div class="modal-body2">
                      <?php
                      echo "<script> document.getElementById('evtStart').value;</script>";
                      ?>
                      <center>

                        <center>
                          <img src="./images/5-Different-styles-of-seating-arrangements.png" id="imgko1" alt="logo" class="" style="width:500px;height:auto;padding:10px 10px 10px 10px;background-color:green">
                          <p>Board Room</p>
                        </center>
                      </center>

                    </div>
                  </div>
                </div>
              </div>


              <input type="submit" name="SubButton" value="Process me" class="btn btn-primary loginButton" style="margin-top: 1.5rem;">

              </form>


            </div>

          </div>
        </div>



        <!-- Modal for Room Selection (Place of Meeting) -->
        <div class="modal fade" id="myModalroom" role="dialog">

          <div class="modal-dialog modal-dialog-scrollable" style="width:95%;">

            <!-- Modal content-->
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" onclick="$('#myModalroom').modal('hide')">&times;</button>
                <!-- <h4 class="modal-title">Result</h4>-->
                <img src="./images/pcn.png" id="imgko1" alt="logo" class="logo" style="width:100px;height:auto;padding-top:20px" onclick="playAudio();$('#myModalroom').modal('hide')">

              </div>

              <div class="modal-body2">

                <center>
                  <center>
                    <img src="./images/boardroom.jpg" id="imgko1" alt="logo" class="" style="width:100px;height:auto;padding:10px 10px 10px 10px;background-color:green" onclick="document.getElementById('qty').focus();document.getElementById('roomko').value='Boardroom';$('#myModalroom').modal('hide');">
                    <p>Board Room</p>
                  </center>
                </center>

              </div>
            </div>
          </div>
        </div>

</body>

<script>
  function fwriteme() {

    alert(document.getElementById("evtstart").value);
    // document.getElementById("evtstartv").value=document.getElementById("evtstart").value;
  }

  function endDate() {

    alert(document.getElementById("evtstart").value);
    // document.getElementById("evtstartv").value=document.getElementById("evtstart").value;
  }




  function fdisplay() {
    var x = document.getElementById("equi_others");
    if (x.checked == 1) {

      document.getElementById("others_rem").style.display = "block";
      document.getElementById("others_rem").focus();
      document.getElementById("others_rem").required = true;
    } else {
      document.getElementById("others_rem").style.display = "none";
      document.getElementById("others_rem").required = false;
    }
  }
  document.getElementById("others_rem").style.display = "none";
  document.getElementById("others_rem1").style.display = "none";


  function fdisplay1() {
    var x = document.getElementById("room_others");
    if (x.checked == true) {

      document.getElementById("others_rem1").style.display = "block";
      document.getElementById("others_rem1").focus();
      document.getElementById("others_rem1").required = true;
    } else {
      document.getElementById("others_rem1").style.display = "none";
      document.getElementById("others_rem1").required = false;
    }
  }


  function fdisplay1x() {
    var x = document.getElementById("room_others");
    if (x.checked == true) {

      document.getElementById("others_rem1").style.display = "block";
      document.getElementById("others_rem1").focus();
      document.getElementById("others_rem1").required = true;
    } else {
      document.getElementById("others_rem1").style.display = "none";
      document.getElementById("others_rem1").required = false;
    }
  }





  function fsoundsys() {
    var x = document.getElementById("soundsys");
    if (x.checked == 1) {
      document.getElementById("s_simple").checked = true;
    } else {
      document.getElementById("s_simple").checked = false;
      document.getElementById("s_advance").checked = false;
    }
  }


  function fclean() {
    var x = document.getElementById("cleanme");
    if (x.checked == 1) {
      document.getElementById("c_before").checked = true;
    } else {
      document.getElementById("c_before").checked = false;
      document.getElementById("c_after").checked = false;
    }
  }



  function fsimple() {
    var x = document.getElementById("s_simple");
    if (x.checked == 1) {
      document.getElementById("soundsys").checked = true;
    }

  }

  function fadvance() {
    var x = document.getElementById("s_advance");
    if (x.checked == 1) {
      document.getElementById("soundsys").checked = true;
    }

  }


  function fbefore() {
    var x = document.getElementById("c_before");
    if (x.checked == 1) {
      document.getElementById("cleanme").checked = true;
    }

  }


  function fafter() {
    var x = document.getElementById("c_after");
    if (x.checked == 1) {
      document.getElementById("cleanme").checked = true;
    }

  }


  function fallday() {
    var x = document.getElementById("allday");
    if (x.checked == 1) {
      document.getElementById("67").checked = true;
      document.getElementById("78").checked = true;
      document.getElementById("89").checked = true;
      document.getElementById("910").checked = true;
      document.getElementById("1011").checked = true;
      document.getElementById("1112").checked = true;
      document.getElementById("121").checked = true;
      document.getElementById("12").checked = true;
      document.getElementById("23").checked = true;
      document.getElementById("34").checked = true;
      document.getElementById("45").checked = true;
      document.getElementById("56").checked = true;
    } else {
      document.getElementById("67").checked = false;
      document.getElementById("78").checked = false;
      document.getElementById("89").checked = false;
      document.getElementById("910").checked = false;
      document.getElementById("1011").checked = false;
      document.getElementById("1112").checked = false;
      document.getElementById("121").checked = false;
      document.getElementById("12").checked = false;
      document.getElementById("23").checked = false;
      document.getElementById("34").checked = false;
      document.getElementById("45").checked = false;
      document.getElementById("56").checked = false;
    }

  }


  function falldayx1() {

    document.getElementById("allday").checked = false;
  }




  function falldayx(timeSlot) {
    var x67 = document.getElementById("67");
    var x78 = document.getElementById("78");
    var x89 = document.getElementById("89");
    var x910 = document.getElementById("910");
    var x1011 = document.getElementById("1011");
    var x1112 = document.getElementById("1112");
    var x121 = document.getElementById("121");
    var x12 = document.getElementById("12");
    var x23 = document.getElementById("23");
    var x34 = document.getElementById("34");
    var x45 = document.getElementById("45");
    var x56 = document.getElementById("56");



    if (x67.checked == 1 && x78.checked == 1 && x89.checked == 1 && x910.checked == 1 && x1011.checked == 1 && x1112.checked == 1 && x121.checked == 1 && x12.checked == 1 && x23.checked == 1 && x34.checked == 1 && x45.checked == 1 && x56.checked == 1) {
      document.getElementById("allday").checked = true;
    } else {
      document.getElementById("allday").checked = false;
    }

  }





  // Check Availability
  function checkAvailability() {
    // Get the selected date from the input field
    // const selectedDateInput = document.getElementById("evtStart");
    const selectedDate = document.getElementById("evtStart").value;

    // Debugging: Log the selectedDate to the console
    console.log("Selected Date:", selectedDate);

    // Send an AJAX request to the server to check availability
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "check_availability.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Define the data to be sent in the request
    const data = `selectedDate=${selectedDate}`;

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Request was successful, handle the response here
          const response = xhr.responseText;
          console.log("Response:", response);
          try {
            const occupiedTimeSlots = JSON.parse(response);

            // Assuming the response is an array of occupied time slots
            const checkboxes = document.querySelectorAll(".time-checkbox input");

            // Loop through checkboxes and disable those that are occupied
            checkboxes.forEach((checkbox) => {
              if (occupiedTimeSlots.includes(checkbox.id)) {
                checkbox.disabled = true;
              } else {
                checkbox.disabled = false;
              }
            });
          } catch (error) {
            console.error('Error parsing JSON response:', error);
          }
        } else {
          // Handle the request error here
          console.error('Request failed with status:', xhr.status);
        }
      }
    };

    // Send the request
    xhr.send(data);
  }

  // Call the checkAvailability function when the page loads and when the date input changes
  window.addEventListener("load", checkAvailability);
  document.getElementById("evtStart").addEventListener("change", checkAvailability);
</script>

</html>

