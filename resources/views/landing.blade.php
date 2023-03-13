<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/js/app.js')
    <title>Join our office!</title>
</head>
<body>
    <div class="main-container flex jc-c ai-c">
        <form class="p br-10 flex col gap">
            <h1>
                Hey,<br>
                join our office!
            </h1>
            <span></span>
            <label>
                <input type="text"  placeholder="Your name"/>
            </label>
            <label>Choose your avatar</label>
            <div class="avatar-container flex wrap gap" id="avatar-container">
                <!-- Load avatars -->
            </div>
            <button>Join!</button>
        </form>
    </div>
</body>
</html>
