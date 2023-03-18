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
    <div class="main-container flex col jc-c ai-c gap">
        @if($errors->any())
            <div class="error-container">
                <b>Notice!</b>
                {!! implode('', $errors->all('<span>:message</span>')) !!}
            </div>
        @endif
        <form class="p br-10 flex col gap" method="POST" action="/api/v1/auth/login">
            <h1>
                <b>Hey,</b><br>
                join our office!
            </h1>
            <span></span>
            <input name="name" type="text" placeholder="Your name" value="{{ old('name') }}"/>
            <label>Choose your avatar</label>
            <input name="avatar" id="avatar_id" hidden/>
            <div class="avatar-container flex wrap gap" id="avatar-container">
                <!-- Load avatars -->
            </div>
            <button type="submit">Join!</button>
        </form>
    </div>
</body>
</html>
