<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mail_invite.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header"></header>
        <div class="mail_invite">
            <h1>招待の承認</h1>
            <form class="form" action="{{route('postMailInvite',[$shop,$user])}}" method="post">
                @csrf
                <p class="confirm">承認いただけるなら、下記のボタンをクリックしてください</p>
                <button class="submit" type="submit">承認</button>
            </form>
        </div>
    </main>
</body>
</html>