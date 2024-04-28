<?php
define('url', "https://api.telegram.org/bot6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w/");

$name = $_GET['name'];
$message = $_GET['message'];
$phone = $_GET['phone'];
$chat_id = '1272046774'; // Remove curly braces

// Format the message
$message = urlencode("Name: ".$name."\nPhone: ".$phone."\nMessage: ".$message);

// Prepare the URL for the Telegram API
$url = url."sendMessage?text=".$message."&chat_id=".$chat_id."&parse_mode=HTML";

// Use file_get_contents or cURL to send the message
$response = file_get_contents($url);

// Check if the message was sent successfully
if ($response) {
    echo "Message sent successfully!";
} else {
    echo "Error sending message.";
}
?>
