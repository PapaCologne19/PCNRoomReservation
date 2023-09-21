<?php
if (isset($_POST['submit'])) {
    // Replace 'YOUR_BOT_TOKEN' with your actual bot token
    $botToken = '6491649796:AAFl5xkJ4u654sMLaHLq9_81cjpeH9Idmhk';
    $chatId = $_POST['userid']; // Replace with the chat ID of the user or group you want to send the message to 2027552190
    $message = $_POST['message']; // The message you want to send

    // Create an associative array with the message parameters
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
    ];

    // Convert the data to JSON format
    $jsonData = json_encode($data);

    // Create the cURL request
    $ch = curl_init('https://api.telegram.org/bot' . $botToken . '/sendMessage');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


    // Execute the cURL request
    $result = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    } else {
        // Check the API response for success
        $response = json_decode($result, true);
        if ($response['ok'] === true) {
            echo 'Message sent successfully!';
        } else {
            echo 'Message sending failed. Error: ' . $response['description'];
        }
    }

    // Close the cURL session
    curl_close($ch);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <div class="container">
            <div class="row">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="g-3">
                    <div class="col-md-4">
                        <label for="" class="form-label">USER ID</label><br>
                        <input type="text" name="userid" id="userid" required>
                    </div><br>
                    <div class="col-md-4">
                        <label for="">Message</label><br>
                        <textarea name="message" id="message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </center>
</body>

</html>