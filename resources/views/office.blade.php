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
                <div class="the-office room"></div>
                <div class="meeting-room room"></div>
                <div class="desk room"></div>
                <div class="silent-room-1 room"></div>
                <div class="silent-room-2 room"></div>
                <div class="kitchen room"></div>
                <div class="break-room room"></div>
                <div class="open-office-1 room"></div>
                <div class="open-office-2 room"></div>
                <div class="silent-room-3 room"></div>
                <img src="/offices/office_base_clean.png" alt=""/>
            </div>
        </div>
    </div>
</body>
</html>
