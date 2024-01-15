<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/item.css') }}">
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
                @guest
                <a class="auth" href="/login">ログイン</a>
                @endguest
                @auth
                <a class="auth" href="/logout">ログアウト</a>
                @endauth
                @guest
                <a class="auth" href="/register">会員登録</a>
                @endguest
                @auth
                <a class="auth" href="/mypage">マイページ</a>
                @endauth
                <a class="sell" href="sell">出品</a>
            </div>
        </header>
        <div class="item">
            <div class="list_link">
                <a class="rec" href="">おすすめ</a>
                <a class="mylist" href="">マイリスト</a>
            </div>
            <div class="item_list">
                
            </div>
        </div>
    </main>
</body>
</html>