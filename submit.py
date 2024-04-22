import requests

def send_telegram_message(name, email, message):
    telegram_api_token = 6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w
    chat_id = 1272046774  # Your Telegram username or chat ID

    message_text = f"New message from {name} ({email}):\n\n{message}"

    telegram_api_url = f"https://api.telegram.org/bot{telegram_api_token}/sendMessage"
    params = {
        "chat_id": chat_id,
        "text": message_text
    }

    response = requests.post(telegram_api_url, params=params)

    if response.status_code == 200:
        print("Message sent successfully!")
    else:
        print("Failed to send message.")

if __name__ == "__main__":
    # Retrieve form data
    import cgi
    form = cgi.FieldStorage()
    name = form.getvalue('name')
    email = form.getvalue('email')
    message = form.getvalue('message')

    # Send message to Telegram
    send_telegram_message(name, email, message)
