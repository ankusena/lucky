const express = require('express');
const axios = require('axios');
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware to parse form data
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// Route to handle form submission
app.post('/submit', (req, res) => {
    const { name, email, message } = req.body;
    
    // Format the message to be sent to Telegram
    const telegramMessage = `New message from Anku Sena Designs website:\n\nName: ${name}\nEmail: ${email}\nMessage: ${message}`;

    // Replace YOUR_BOT_TOKEN and YOUR_CHAT_ID with your actual bot token and chat ID
    const botToken = '6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w';
    const chatId = '1272046774';
    const telegramApiUrl = `https://api.telegram.org/bot${botToken}/sendMessage`;

    // Send the message to Telegram using axios
    axios.post(telegramApiUrl, {
        chat_id: chatId,
        text: telegramMessage
    })
    .then(response => {
        console.log('Message sent to Telegram:', response.data);
        res.send('Message sent successfully!');
    })
    .catch(error => {
        console.error('Error sending message to Telegram:', error);
        res.status(500).send('Error sending message to Telegram');
    });
});

// Start the server
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
});
