// Chat Container Elements
const sendChatMessageBtn = document.getElementById('sendChatMessageBtn');
const chatMessageInput = document.getElementById('chatMessageInput');
const chatHistoryContainer = document.getElementById('chatHistoryContainer');
let incomingId = 0;

sendChatMessageBtn.onclick = ()=>{
    const message = chatMessageInput.value;
    if(message){
        const messageData = {
            incoming_id: incomingId,
            message
        }
        let xhr = new XMLHttpRequest();
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    chatMessageInput.value = "";
                    scrollToBottom();
                }
            }
        }
        let formData = new FormData();
        formData.append('chatData', JSON.stringify(messageData))

        xhr.open("POST", "api/insert-chat.php", true);
        xhr.send(formData);
    }
}

document.addEventListener("click", async function(event){
    if(event.target.id === 'chatHistoryUser'){
        incomingId = event.target.getAttribute('data-id');
        removeClass('chat-history-active-user');
        event.target.parentNode.parentNode.classList.add('chat-history-active-user');;
    }
});


setInterval(() =>{
    if(incomingId){
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "api/get-chat.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    chatHistoryContainer.innerHTML = data;
                    scrollToBottom();
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("incoming_id=" + incomingId);
    }
}, 500);

function scrollToBottom(){
    chatHistoryContainer.parentNode.scrollTop = chatHistoryContainer.scrollHeight;
}

function removeClass(className) {
    const elements = document.querySelectorAll('.' + className);

    for (let i = 0; i < elements.length; i++) {
        elements[i].classList.remove(className);
    }
}