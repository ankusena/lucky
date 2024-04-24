const form = document.querySelector('#form')

form.addEventListener("submit", (e) => {e.preventdefault ()

    var text = document.querySelector('#text').value

    var token = "6918983860:AAGp94A9inhJay50pL_OHf7TXpO0uchgS0w"

    var chat_id = "1272046774"

    var my_text = 'my text is ${text}'

    var url = 'https://api.telegram.org/bot{$token}/sendMessage?chat_id=${chat_id}&text=${my_text}'

    let api =new XMLHttpRequest()

    api.open("GET", url, true)

    api,send()

    text.value = ""

})