<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    <title>The Office</title>
</head>
<body>
    <div class="main-container flex">
        <div class="side-container flex col jc-sb gap p">
            <div class="session-container flex col gap p">
                <div class="flex gap ai-c">
                    <div class="user-avatar">
                        <img src="/avatars/avatar-{{ $avatar_id }}.svg" alt=""/>
                    </div>
                    <div class="flex col">
                        <span class="name">{{ $name }}</span>
                        <span class="session-length">Working for <b class="time"></b></span>
                    </div>
                </div>
                <form method="POST" action="/api/v1/auth/logout">
                    <button type="submit">Exit the office</button>
                </form>
            </div>
            <span class="line"></span>
            <div class="room-container flex col gap p">
                <!-- JS loads rooms and their status --->
            </div>
            <span class="line"></span>
            <div class="chat-container flex col gap p">
                <b><span id="chat-title">Global</span> chat</b>
                <div class="chat flex col gap p">
                    <div class="start flex ai-c gap"><span class="line"></span> This is the start of this chat <span class="line"></span></div>
                    <!-- JS loads chat --->
                </div>
                <form class="message-form flex gap" method="POST">
                    <input class="message-text" placeholder="Send a message..." type="text" min="1" max="100" required/>
                    <button class="flex jc-c ai-c" type="submit"><img src="/icons/send.svg" alt=""/></button>
                </form>
            </div>
        </div>
        <div class="office-container flex jc-c ai-c p">
            <div id="office">
                <div class="user" id="user" draggable="true"></div>
{{--                <div class="default-room room" id="1"></div>--}}
                <div class="the-office room" id="2"></div>
                <div class="meeting-room room" id="8"></div>
                <div class="desk room" id="11"></div>
                <div class="silent-room-1 room" id="5"></div>
                <div class="silent-room-2 room" id="6"></div>
                <div class="silent-room-3 room" id="7"></div>
                <div class="kitchen room" id="10"></div>
                <div class="break-room room" id="9"></div>
                <div class="open-office-1 part-1 room" id="3"></div>
                <div class="open-office-1 part-2 room" id="3"></div>
                <div class="open-office-2 room" id="4"></div>
                <img src="/offices/office_base_clean.png" alt=""/>
            </div>
        </div>
    </div>
</body>
</html>
