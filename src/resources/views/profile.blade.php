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
            <a class="page_title" href="/">
                <p class="logo_space">
                    <img class="logo" src="{{asset('img/logo_img.svg')}}">
                </p>
                <p class="title_space">
                    <img class="title" src="{{asset('img/coachtech_img.png')}}">
                </p>
            </a>
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
        <form action="/mypage/profile" method="post" enctype="multipart/form-data">
            @csrf
            <h1>プロフィール設定</h1>
            <div class="img">
                @if(empty($profile===null))
                @if($profile->img===null)
                <p class="no_img"></p>
                @else
                <img class="profile_img" src="{{Storage::disk('s3')->url(optional($profile)->img)}}">
                @endif
                @else
                <p class="no_img"></p>
                @endif
                <input class="file" type="file" name="img" value="{{optional($profile)['img']}}">
            </div>
            <div class="content">
                <h2>ユーザー名</h2>
                <input class="text_input" type="text" name="name" value="{{optional($profile)['name']}}">
                @error('name')
                <p class="error">{{$errors->first('name')}}</p>
                @enderror
                <p class="req">※必須</p>
            </div>
            <div class="content">
                <h2>郵便番号</h2>
                <input class="text_input" type="text" name="post_code" value="{{optional($profile)['post_code']}}">
                @error('post_code')
                <p class="error">{{$errors->first('post_code')}}</p>
                @enderror
                <p class="req">※ハイフンを含めて入力してください、必須</p>
            </div>
            <div class="content">
                <h2>住所</h2>
                <input class="text_input" type="text" name="address" value="{{optional($profile)['address']}}">
                @error('address')
                <p class="error">{{$errors->first('address')}}</p>
                @enderror
                <p class="req">※必須</p>
            </div>
            <div class="content">
                <h2>建物名</h2>
                <input class="text_input" type="text" name="building" value="{{optional($profile)['building']}}">
            </div>
            <button class="update" type="submit">更新する</button>
        </form>
        </div>
    </main>
</body>
</html>