<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop_management.css') }}">
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
        <div class="shop_management">
            <h1>ショップ管理ページ</h1>
            <p class="message">{{session('message')}}</p>
            <div class="content">
                <a class="link" href="/shop/invite">スタッフ招待</a>
            </div>
            <div class="content">
                <a class="link" href="/shop/staff_delete">スタッフ削除</a>
            </div>
            <div class="content">
                <a class="link" href="/shop/sell">出品</a>
            </div>
        </div>
</body>
</html>