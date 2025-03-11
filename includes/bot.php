    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0">
    <script src="script.js" defer></script>
    <button class="chatbot-toggler" aria-label="Toggle Chatbot">
        <span class="material-symbols-rounded">
            <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 60 60" xml:space="preserve" stroke="#000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M59.949,58.684L55.104,44.15C57.654,39.702,59,34.647,59,29.5C59,13.233,45.767,0,29.5,0S0,13.233,0,29.5S13.233,59,29.5,59 c4.64,0,9.257-1.108,13.378-3.208l15.867,4.176C58.83,59.989,58.915,60,59,60c0.272,0,0.538-0.112,0.729-0.316 C59.98,59.416,60.065,59.032,59.949,58.684z M16,21.015h14c0.552,0,1,0.448,1,1s-0.448,1-1,1H16c-0.552,0-1-0.448-1-1 S15.448,21.015,16,21.015z M43,39.015H16c-0.552,0-1-0.448-1-1s0.448-1,1-1h27c0.552,0,1,0.448,1,1S43.552,39.015,43,39.015z M43,31.015H16c-0.552,0-1-0.448-1-1s0.448-1,1-1h27c0.552,0,1,0.448,1,1S43.552,31.015,43,31.015z">
                    </path>
                </g>
            </svg>
        </span>
        <span class="material-symbols-outlined">close</span>
    </button>

    <div class="botwrapperout">

    </div>
    <div class="botwrapper">
        <div class="title">
            <img src="assets/favicon/QUINTETBOT.png" alt="">
        </div>
        <div class="botform">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <img src="assets/favicon/android-chrome-192x192.png" alt="">
                </div>
                <div class="msg-header">
                    <p>Hello there, how can I help you?</p>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">
                    <i class='bx bx-send'></i>
                </button>
            </div>
        </div>
    </div>

    <script>
$(document).ready(function() {
    $("#send-btn").on("click", function() {
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value +
            '</p></div></div>';
        $(".botform").append($msg);
        $("#data").val('');

        // Start AJAX code
        $.ajax({
            url: 'includes/message.php',
            type: 'POST',
            data: {
                text: $value
            },
            success: function(result) {
                $replay =
                    '<div class="bot-inbox inbox"><div class="icon"><img src="assets/favicon/android-chrome-192x192.png" alt=""></div><div class="msg-header">' +
                    result + '</div></div>';
                $(".botform").append($replay);
                // Scroll to bottom when new message is added
                $(".botform").scrollTop($(".botform")[0].scrollHeight);
            }
        });
    });
});
    </script>

    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

.botwrapper::-webkit-scrollbar {
    width: 3px;
    border-radius: 25px;
}

.botwrapper::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.botwrapper::-webkit-scrollbar-thumb {
    background: #ddd;
}

.botwrapper::-webkit-scrollbar-thumb:hover {
    background: #ccc;
}

.botwrapperout {
    position: fixed;
    top: 0;
    display: none;
    left: 0;
    width: 100%;
    height: 100vh;
    background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5));
    z-index: 999 !important;
}

.botwrapper {
    position: fixed;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
    right: 1%;
    bottom: 10%;
    z-index: 999999999999999999999999999999999999999999999999999999999999999999 !important;
    width: 370px;
    background: #fff;
    border-top: 0px;
    display: none;
    border-radius: 10px;
    transition: 0.5s all linear;
}

.botwrapper .title img {
    padding: 20px;
    width: 50%;
}

.botwrapper .title {
    background: #000;
    color: #fff;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    font-weight: 500;
    line-height: 60px;
    text-align: start;
    border-radius: 5px 5px 0 0;
}

.botwrapper .botform {
    padding: 20px 15px;
    min-height: 400px;
    max-height: 400px;
    overflow-y: auto;
}

.botwrapper .botform .inbox {
    width: 100%;
    display: flex;
    align-items: baseline;
}

.botwrapper .botform .user-inbox {
    justify-content: flex-end;
    margin: 13px 0;
}

.botwrapper .botform .inbox .icon img {
    width: 100%;
    height: 100%;
    border: 1px solid black;
    border-radius: 50%;
}

.botwrapper .botform .inbox .icon {
    height: 40px;
    width: 40px;
    object-fit: cover;
    color: #fff;
    text-align: center;
    text-transform: uppercase;
    line-height: 40px;
    border-radius: 50%;
    font-size: 18px;
    background: #000;
}

.botwrapper .botform .inbox .msg-header {
    max-width: 53%;
    margin-left: 10px;
    color: #fff;
    word-break: break-all !important;
    background: #000;
    padding: 8px 10px;
    text-transform: uppercase;

}


.botwrapper .typing-field {
    display: flex;
    height: 50px;
    width: 90%;
    padding: 10px;
    align-items: center;
    justify-content: space-evenly;
    background: #fff;
    border: 3px solid #000;
    margin: 20px;
}

.botwrapper .typing-field .input-data {
    height: 40px;
    width: 335px;
    position: relative;
}

.botwrapper .typing-field .input-data input {
    height: 100%;
    width: 100%;
    outline: none;
    border: 1px solid transparent;
    padding: 0 80px 0 15px;
    border-radius: 3px;
    font-weight: bold;
    color: #000;
    font-size: 10px;
    background: #fff;
    text-transform: uppercase;
    transition: all 0.3s ease;
}


.input-data input::placeholder {
    color: #000;
    font-size: 10px;
    transition: all 0.3s ease;
}

.input-data input:focus::placeholder {
    color: #bfbfbf;
}

.botwrapper .typing-field .input-data button {
    position: absolute;
    right: 5px;
    top: 50%;
    height: 35px;
    width: 50px;
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    cursor: pointer;
    outline: none;
    opacity: 0;
    pointer-events: none;
    background: #000;
    border: 1px solid #000;
    transform: translateY(-50%);
    transition: all 0.3s ease;
}

.botwrapper .typing-field .input-data button .bx-send {
    transform: rotate(-40deg);

}

.botwrapper .typing-field .input-data input:valid~button {
    opacity: 1;
    pointer-events: auto;
}
    </style>
    <style>
/* Chatbot Box */

/* Button Styling */
.chatbot-toggler {
    position: fixed;
    bottom: 1%;
    right: 1%;
    background: #000;
    color: black;
    border: none;
    width: 80px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    border: 1px solid white;
    font-size: 24px;
    z-index: 999999999999999999999999999999999999999999999 !important;
}

.chatbot-toggler span {
    display: none;
    font-size: 18px;
    color: #fff !important;
}

.chatbot-toggler .material-symbols-rounded {
    display: inline;
}

.chatbot-toggler.active .material-symbols-rounded {
    display: none;
}

.chatbot-toggler.active .material-symbols-outlined {
    display: inline;
}
    </style>
    <script>
const toggleBtn = document.querySelector(".chatbot-toggler");
const botwrapper = document.querySelector(".botwrapper");
const botwrapperout = document.querySelector(".botwrapperout");

toggleBtn.addEventListener("click", () => {
    botwrapper.style.display = botwrapper.style.display === "none" || botwrapper.style.display === "" ?
        "block" : "none";
    botwrapperout.style.display = botwrapperout.style.display === "none" || botwrapperout.style.display === "" ?
        "block" : "none";
    toggleBtn.classList.toggle("active");
});
    </script>