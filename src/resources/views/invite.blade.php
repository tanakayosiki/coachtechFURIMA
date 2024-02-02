<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/invite.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header">
            <a class="page_title" href="/shop">
                <p class="logo_space">
                    <img class="logo" src="{{asset('img/logo_img.svg')}}">
                </p>
                <p class="title_space">
                    <img class="title" src="{{asset('img/coachtech_img.png')}}">
                </p>
                <p class="shop_space">
                    <img class="shop_icon" src="{{asset('img/shop.svg')}}">
                </p>
            </a>
        </header>
        <div class="invite">
            <h1>招待メール</h1>
            <form class="form" action="{{route('sendInvite',$shop->id)}}" method="get">
                <p class="title">メールアドレス</p>
                <input type="email" name="email" value="{{old('email')}}">
                <button class="submit" type="submit">送信する</button>
            </form>
        </div>
</body>
</html>