<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header">
            <a class="page_title" href="/">
                <p>
                    <img  class="logo" src="{{asset('img/logo_img.svg')}}">
                </p>
                <p>
                    <img  class="title" src="{{asset('img/coachtech_img.png')}}">
                </p>
            </a>
        </header>
        <div class="admin">
            <h1>管理者ページ</h1>
            <div class="content">
                <a class="link" href="/admin/userlist">ユーザーを削除する</a>
            </div>
            <div class="content">
                <a class="link" href="{{route('check')}}">ショップとユーザーのメッセージを確認する</a>
            </div>
            <div class="mail">
                <a class="send" href="/admin/mail">メール送信</a>
            </div>
        </div>
    </main>
</body>
</html>