<?php
// Define the base URL for the Telegram Bot API
define ('url', "https://api.telegram.org/bot6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w/");

// Extract values from the URL parameters
$name = $_GET['name'];
$message = $_GET['message'];
$phone = $_GET['phone'];

// Define the chat ID
$chat_id = '-1002018391847';

// Construct the message
$message_text = urlencode("Name: $name\nPhone: $phone\nMessage: $message");

// Construct the URL for sending the message
$url = url . "sendMessage?text=$message_text&chat_id=$chat_id&parse_mode=HTML";

// Send the message using file_get_contents
$response = file_get_contents($url);

// Check if the message was sent successfully
if ($response) {
    echo "Message sent successfully!";
} else {
    echo "Error sending message.";
}
?>
