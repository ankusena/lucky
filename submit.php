<?php
// Telegram Bot API token
$token = '6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w';

// Your Telegram chat ID
$chatID = '1272046774';

// Message to be sent
$message = "New project details:\n\n";
$message .= "Name: " . $_POST['name'] . "\n";
$message .= "Email: " . $_POST['email'] . "\n";
$message .= "Message: " . $_POST['message'];

// Telegram API endpoint URL
$url = "https://api.telegram.org/bot6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w/sendMessage";

// Prepare POST data
$data = array(
    'chat_id' => $chatID,
        'text' => $message
        );

        // Initialize cURL
        $ch = curl_init($url);

        // Set cURL options
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL request
        $response = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Check if message was sent successfully
        if ($response === false) {
            // Handle error
                echo 'Error: ' . curl_error($ch);
                } else {
                    // Message sent successfully
                        echo 'Message sent!';
                        }
