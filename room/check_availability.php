<?php
include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
// Get room and date from the AJAX request
$roomName = $_POST['roomName'];
$selectedDate = $_POST['selectedDate'];

// Query the database to check room availability
$sql = "SELECT COUNT(*) AS appointmentCount
            FROM events 
            WHERE evt_start = '$selectedDate'";
$result = $connect->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row["appointmentCount"] > 0) {
        // If there are appointments for the selected room and date
        $response = ["available" => false]; // Room is not available (mark as yellow)
    } else {
        // If no appointments for the selected room and date
        $response = ["available" => true]; // Room is available (mark as green)
    }
    echo json_encode($response);

} else {
    echo json_encode(["error" => "Database error"]);
}


// Close the database connection
$connect->close();
}
?>
