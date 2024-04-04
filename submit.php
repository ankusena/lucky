<?php
// Telegram Bot API token
define('BOT_TOKEN', 'YOUR_BOT_TOKEN');

// Your Telegram username or chat ID
define('TELEGRAM_CHAT_ID', 'YOUR_TELEGRAM_CHAT_ID');

// Function to send message to Telegram
function sendMessageToTelegram($message) {
    $url = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMessage';
        $data = array('chat_id' => TELEGRAM_CHAT_ID, 'text' => $message);
            
                // Use cURL to send the message
                    $ch = curl_init($url);
                        curl_setopt($ch, CURLOPT_POST, true);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    $response = curl_exec($ch);
                                        curl_close($ch);
                                            
                                                return $response;
                                                }

                                                // Check if form is submitted
                                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                    // Retrieve form data
                                                        $name = $_POST['name'];
                                                            $email = $_POST['email'];
                                                                $message = $_POST['message'];
                                                                    
                                                                        // Construct message to send to Telegram
                                                                            $telegramMessage = "New submission from website:\nName: $name\nEmail: $email\nMessage: $message";
                                                                                
                                                                                    // Send message to Telegram
                                                                                        $result = sendMessageToTelegram($telegramMessage);
                                                                                            
                                                                                                // Check if message was sent successfully
                                                                                                    if ($result === false) {
                                                                                                            echo "Error: Unable to send message to Telegram.";
                                                                                                                } else {
                                                                                                                        echo "Message sent to Telegram successfully!";
                                                                                                                            }
                                                                                                                            } else {
                                                                                                                                echo "Error: Form submission method not allowed.";
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                                