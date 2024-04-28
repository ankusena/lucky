<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the base URL for the Telegram Bot API
define('url', "https://api.telegram.org/botYOUR_BOT_TOKEN/"); // Replace YOUR_BOT_TOKEN with your actual bot token

// Extract parameters from the URL
$name = isset($_GET['name']) ? $_GET['name'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$tel = isset($_GET['tel']) ? $_GET['tel'] : '';
$message = isset($_GET['message']) ? $_GET['message'] : '';
$graphics = isset($_GET['graphics']) && $_GET['graphics'] == 'on' ? 'Yes' : 'No';
$file = isset($_GET['file']) ? $_GET['file'] : '';

// Define the chat ID where you want to send the message
$chat_id = '-100YOUR_CHANNEL_ID'; // Replace with your channel ID

// Compose the message
$message_text = "New order received:\n\n";
$message_text .= "Name: $name\n";
$message_text .= "Email: $email\n";
$message_text .= "Phone: $tel\n";
$message_text .= "Message: $message\n";
$message_text .= "Graphics Design: $graphics\n";
$message_text .= "File: $file";

// URL encode the message
$message_text = urlencode($message_text);

// Prepare the URL for the Telegram API
$url = url."sendMessage?text=".$message_text."&chat_id=".$chat_id."&parse_mode=HTML";

// Use file_get_contents or cURL to send the message
$response = file_get_contents($url);

// Log the response for debugging
file_put_contents('telegram_log.txt', date('Y-m-d H:i:s') . ' - Response: ' . $response . PHP_EOL, FILE_APPEND);

// Check if the message was sent successfully
if ($response) {
    echo "Message sent successfully!";
} else {
    echo "Error sending message.";
}
?>
