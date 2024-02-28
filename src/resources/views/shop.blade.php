<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
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
        <div class="shop">
            <div class="item">
            <div class="list_link">
                @if(Request::is('shop'))
                <a class="rec" href="/shop">おすすめ</a>
                @else
                <a class="no_rec" href="/shop">おすすめ</a>
                @endif
                @if(Request::is('mylist'))
                <a class="mylist" href="/shop/mylist">マイリスト</a>
                @else
                <a class="no_mylist" href="/shop/mylist">マイリスト</a>
                @endif
            </div>
            <p class="message">{{session('message')}}</p>
            <div class="item_list">
                @foreach($items as $item)
                @if($item->item->buy===null)
                <div class="content">
                    <a class="detail" href="{{route('shopDetail',$item->item->id)}}">
                        <img class="item_img" src="{{Storage::disk('s3')->url($item->item->img)}}">
                        <p class="amount">¥{{$item->item->amount}}</p>
                    </a>
                </div>
                @else
                <div class="content">
                    <a class="detail" href="{{route('shopDetail',$item->item->id)}}">
                        <img class="item_img" src="{{Storage::disk('s3')->url($item->item->img)}}">
                        <p class="amount">¥{{$item->item->amount}}</p>
                        <p class="sold">sold out</p>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
            <footer class="footer">
                <a class="admin_link" href="/admin">管理者ページ</a>
                <a class="new_shop" href="/newshop">ショップ開設</a>
                <a class="shop_management" href="/shop/management">ショップ管理</a>
                <a class="back_link" href="/">トップページへ</a>
            </footer>
        </div>
    </main>
</body>
</html>