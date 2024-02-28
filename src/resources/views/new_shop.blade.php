<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/new_shop.css') }}">
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
        <div class="new_shop">
            <form class="form" action="{{route('postNewShop')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h1>ショップ登録</h1>
                <h2>ショップ画像</h2>
                <input class="input" type="file" name="img">
                <h2>ショップ名</h2>
                <input class="input" type="text" name="name" value="{{old('name')}}">
                <h2>ショップ情報</h2>
                <textarea name="detail" cols="30" value="{{old('detail')}}"></textarea>
                <button class="submit" type="submit">開設する</button>
            </form>
        </div>
    </main>
</body>
</html>