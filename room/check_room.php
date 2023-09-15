<?php

// Include the database connection
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get user input (room name and selected date)
    $roomName = $_POST['roomName'];
    $selectedDate = $_POST['selectedDate'];

    // Construct and execute a query to check if any appointments exist for the selected room and date
    $query = "SELECT `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56` 
    FROM events 
    WHERE evt_start = '$selectedDate'";

    $result = $connect->query($query);

    $response = array();

    if ($result->num_rows > 0) {
        // Room has appointments for the selected date
        $allAppointments = true;

        while ($row = $result->fetch_assoc()) {
            foreach ($row as $timeSlot) {
                if (empty($timeSlot)) {
                    // If any time slot is empty, not all appointments are booked
                    $allAppointments = false;
                    break;
                }
            }
        }

        if ($allAppointments) {
            // Room has all appointments, set the response to red
            $response['color'] = "red";
        } else {
            // Room has some appointments but not all, set the response to yellow
            $response['color'] = "yellow";
        }
    } else {
        // Room has no appointments, set the response to green
        $response['color'] = "green";
    }

    // Close the database connection
    $connect->close();

    // Return the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
