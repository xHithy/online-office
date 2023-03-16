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
        <div class="side-container"></div>
        <div class="office-container flex jc-c ai-c p">
            <div id="office">
                <div class="user" id="user" draggable="true"><span>You</span><img src="/avatars/avatar-1.svg" alt=""/></div>
                <div class="the-office room" id="1"></div>
                <div class="meeting-room room" id="7"></div>
                <div class="desk room" id="10"></div>
                <div class="silent-room-1 room" id="4"></div>
                <div class="silent-room-2 room" id="5"></div>
                <div class="silent-room-3 room" id="6"></div>
                <div class="kitchen room" id="9"></div>
                <div class="break-room room" id="8"></div>
                <div class="open-office-1 part-1 room" id="2"></div>
                <div class="open-office-1 part-2 room" id="2"></div>
                <div class="open-office-2 room" id="3"></div>
                <img src="/offices/office_base_clean.png" alt=""/>
            </div>
        </div>
    </div>
</body>
</html>
