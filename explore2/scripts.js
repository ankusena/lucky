document.addEventListener('DOMContentLoaded', function () {
        const nav = document.getElementById('nav-bar');
        let prevScrollpos = window.pageYOffset;

        window.onscroll = function () {
                let currentScrollPos = window.pageYOffset;
                if (prevScrollpos > currentScrollPos) {
                        nav.style.top = "0";
                } else {
                        nav.style.top = "-50px";
                }
                prevScrollpos = currentScrollPos;
        }

        const chatbotMessages = document.getElementById('chatbot-messages');
        const chatbotInput = document.getElementById('chatbot-input');
        const chatbotSend = document.getElementById('chatbot-send');

        chatbotSend.addEventListener('click', function () {
                const message = chatbotInput.value.trim();
                if (message) {
                        addMessageToChatbot('User', message);
                        chatbotInput.value = '';
                        // Simulate chatbot response
                        setTimeout(function () {
                                addMessageToChatbot('Chatbot', 'This is a response.');
                        }, 1000);
                }
        });

        function addMessageToChatbot(sender, message) {
                const messageDiv = document.createElement('div');
                messageDiv.textContent = `${sender}: ${message}`;
                chatbotMessages.appendChild(messageDiv);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }
});
                                                                                                                                                                                                                                                    
