<?php
// Set your bot token and chat ID
$token = '6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w';
$chat_id = '1272046774'; // This is your chat ID

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Compose the message to send to Telegram
$text = "New message from your website:\n\n";
$text .= "Name: $name\n";
$text .= "Email: $email\n";
$text .= "Message: $message";

// Prepare the URL for the Telegram API
$url = "https://api.telegram.org/bot$token/sendMessage";

// Prepare the data to be sent
$data = [
    'chat_id' => $chat_id,
    'text' => $text,
];

// Use cURL to send the message
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Check if the message was sent successfully
if ($response && json_decode($response)->ok) {
    echo "Message sent successfully!";
} else {
    echo "Error sending message.";
}
?>
