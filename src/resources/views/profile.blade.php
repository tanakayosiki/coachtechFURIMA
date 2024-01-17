<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
        <div class="profile">
        <form action="/mypage/profile" method="post">
            <h1>プロフィール設定</h1>
            <div class="img">
                <img class="profile_img" src="">
                <label>
                    <input type="file" name="img">画像を選択する
                </label>
            </div>
            <div class="content">
                <h2>ユーザー名</h2>
                <input class="text_input" type="text" name="name" value="{{old('name')}}">
            </div>
            <div class="content">
                <h2>郵便番号</h2>
                <input class="text_input" type="text" name="post_code" value="{{old('post_code')}}">
                <p class="hyphen">※ハイフンを含んで入力してください</p>
            </div>
            <div class="content">
                <h2>住所</h2>
                <input class="text_input" type="text" name="address" value="{{old('address')}}">
            </div>
            <div class="content">
                <h2>建物名</h2>
                <input class="text_input" type="text" name="building" value="{{old('building')}}">
            </div>
            <button class="update" type="submit">更新する</button>
        </form>
        </div>
</body>
</html>