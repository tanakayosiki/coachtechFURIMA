<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header">
            <a class="page_title" href="/">
                <p class="logo_space">
                    <img class="logo" src="{{asset('img/logo_img.svg')}}">
                </p>
                <p class="title_space">
                    <img class="title" src="{{asset('img/coachtech_img.png')}}">
                </p>
            </a>
        </header>
        <div class="login">
        <form class="form" action="/login" method="post">
            @csrf
            <h1 class="login_header">ログイン</h1>
            <p class="message">{{session('message')}}</p>
            <div class="content">
                <div class="email">
                    <p class="item">メールアドレス</p>
                    <div class="text">
                        <input class="input" type="email" name="email" value="{{old('email')}}">
                        @error('email')
                        <p class="error">{{$errors->first('email')}}
                        @enderror
                    </div>
                </div>
                <div class="password">
                    <p class="item">パスワード</p>
                    <div class="text">
                        <input class="input" type="password" name="password" value="{{old('password')}}">
                        @error('password')
                        <p class="error">{{$errors->first('password')}}
                        @enderror
                    </div>
                </div>
                <button class="submit" type="submit">ログインする</button>
                <div class="register">
                    <a class="link" href="register">会員登録はこちら</a>
                </div>
            </div>
        </form>
        </div>
    </main>
</body>
</html>