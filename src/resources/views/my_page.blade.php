<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/my_page.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header">
            <div class="page_title">
                <p class="logo_space">
                    <img class="logo" src="{{asset('img/logo_img.svg')}}">
                </p>
                <p class="title_space">
                    <img class="title" src="{{asset('img/coachtech_img.png')}}">
                </p>
            </div>
            <div class="text">
                <input class="input" type="text" name="keyword" placeholder="何をお探しですか？" onchange="this.form.submit()">
            </div>
            <div class="link">
                <a class="auth" href="/logout">ログアウト</a>
                <a class="auth" href="/mypage">マイページ</a>
                <form class="sell" action="/sell" method="get">
                    <button class="submit" type="submit">出品</button>
                    <input type="hidden" name="id" value="{{optional($user)->id}}">
                </form>
            </div>
        </header>
        <div class="my_page">
            <div class="profile">
                <div class="img">
                    <img class="now_img" src="{{Storage::url(optional($profile)->img)}}">
                </div>
                <div class="name">
                    <h2>ユーザー名</h2>
                    <p class="now_name">{{$profile['name']}}</p>
                </div>
                <div class="update">
                    <a class="update_link" href="mypage/profile">プロフィールを編集</a>
                </div>
            </div>
            <div class="item_link">
                <a class="sell_item" href="">出品した商品</a>
                <a class="buy_item" href="">購入した商品</a>
            </div>
            <div class="item_list">

            </div>
        </div>
</body>
</htmL>