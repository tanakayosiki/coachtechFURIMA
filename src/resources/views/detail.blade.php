<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
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
                <form class="sell" action="/sell" method="get">
                    <button class="submit" type="submit">出品</button>
                    <input type="hidden" name="id" value="{{optional($user)->id}}">
                </form>
            </div>
        </header>
        <div class="detail">
            <div class="img">
                <img class="img_path" src="{{Storage::url($item->img)}}">
            </div>
            <div class="overview">
                <div class="name">
                    <p class="item_name">{{$item['name']}}</p>
                    <p class="brand">{{$item['brand']}}</p>
                </div>
                <p class="amount">¥{{$item['amount']}}</p>
                <div class="option">
                    @if($item->is_liked_by_auth_user())
                    <div class="nice">
                        <a class="star" href="{{route('unnice',$item->id)}}"></a>
                    </div>
                    @else
                    <div class="nice">
                        <a class="off_star" href="{{route('nice',$item)}}"></a>
                    </div>
                    @endif
                    <a class="comment" href="">
                        <img class="comment_img" src="{{asset('img/comment.svg')}}">
                    </a>
                </div>
                <div class="button">
                    <form action="{{route('buy',$item->id)}}" method="get">
                        <button class="buy" type="submit">購入する</button>
                    </form>
                </div>
                <div class="explanation">
                    <h2>商品説明</h2>
                    <p class="item_detail">{{$item['detail']}}</p>
                </div>
                <div class="info">
                    <h2>商品の情報</h2>
                    <div class="info_content">
                        <h3>カテゴリー</h3>
                        <p class="category">{{$item['category']}}</p>
                    </div>
                    <div class="info_content">
                        <h3>商品の状態</h3>
                        <p class="situation">{{$item['situation']}}</p>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>