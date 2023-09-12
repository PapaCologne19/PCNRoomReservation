<?php

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected date from the AJAX request
    $selectedDate = $_POST['selectedDate'];
    // var_dump($_POST['selectedDate']);
    // Initialize an array to store occupied time slots
    $occupiedTimeSlots = array();

    // Example SQL query to check which time slots are occupied for the selected date
    $sql = "SELECT x67, x78, x89, x910, x1011, x1112, x121, x12, x23, x34, x45, x56 
    FROM events 
    WHERE evt_start = '$selectedDate'";
    $result = $connect->query($sql);
    
    // echo $sql . $selectedDate;

    if ($result->num_rows > 0) {
        // Loop through the query results to identify occupied time slots
        while ($row = $result->fetch_assoc()) {
            // Check each column (time slot) for occupancy and update the $occupiedTimeSlots array
            foreach ($row as $key => $value) {
                if ($value == 1) {
                    $occupiedTimeSlots[] = $key;
                }
            }
        }
    }

    // Set the response content type to JSON
    header('Content-Type: application/json');

    // Output the JSON response
    echo json_encode($occupiedTimeSlots);
}

?>
