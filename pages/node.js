const express = require('express');
const bodyParser = require('body-parser');
const axios = require('axios');
const fs = require('fs');
const app = express();

const TELEGRAM_BOT_TOKEN = '6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w';
const DOWNLOAD_PATH = './public/uploads/';
const WEBSITE_MEDIA_URL = 'https://yourwebsite.com/uploads/';

app.use(bodyParser.json());

// Webhook to handle Telegram updates
app.post('/telegram-webhook', async (req, res) => {
    const message = req.body.message;

    if (message && message.photo) {
        const photoArray = message.photo;
        const highestQualityPhoto = photoArray[photoArray.length - 1]; // Get the best quality
        const fileId = highestQualityPhoto.file_id;

        // Download and save the photo
        await downloadTelegramFile(fileId, 'image');
    }

    if (message && message.video) {
        const video = message.video;
        const fileId = video.file_id;

        // Download and save the video
        await downloadTelegramFile(fileId, 'video');
    }

    res.sendStatus(200);
});

// Download file from Telegram and save to server
async function downloadTelegramFile(fileId, type) {
    const filePathResponse = await axios.get(`https://api.telegram.org/bot$6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w/getFile?file_id=${fileId}`);
    const filePath = filePathResponse.data.result.file_path;

    const fileUrl = `https://api.telegram.org/file/bot$6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w/${filePath}`;
    const extension = type === 'image' ? 'jpg' : 'mp4';
    const fileName = `${Date.now()}.${extension}`;
    const fullPath = `${DOWNLOAD_PATH}${fileName}`;

    const response = await axios({
        url: fileUrl,
        method: 'GET',
        responseType: 'stream',
    });

    response.data.pipe(fs.createWriteStream(fullPath));

    response.data.on('end', () => {
        console.log(`${type} saved: ${WEBSITE_MEDIA_URL}${fileName}`);
    });
}

// Start server
app.listen(3000, () => {
    console.log('Server running on port 3000');
});
