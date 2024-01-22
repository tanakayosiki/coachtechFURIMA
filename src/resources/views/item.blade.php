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
        <div class="item">
            <div class="list_link">
                @if(Request::is('/'))
                <a class="rec" href="/">おすすめ</a>
                @else
                <a class="no_rec" href="/">おすすめ</a>
                @endif
                @if(Request::is('mylist'))
                <a class="mylist" href="/mylist">マイリスト</a>
                @else
                <a class="no_mylist" href="/mylist">マイリスト</a>
                @endif
            </div>
            <p class="message">{{session('message')}}</p>
            <div class="item_list">
                @foreach($items as $item)
                @if($item->buy===null)
                <div class="content">
                    <a class="detail" href="{{route('detail',$item->id)}}">
                        <img class="item_img" src="{{Storage::url($item->img)}}">
                        <p class="amount">¥{{$item['amount']}}</p>
                    </a>
                </div>
                @else
                <div class="content">
                    <a class="detail" href="{{route('detail',$item->id)}}">
                        <img class="item_img" src="{{Storage::url($item->img)}}">
                        <p class="amount">¥{{$item['amount']}}</p>
                        <p class="sold">sold out</p>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>