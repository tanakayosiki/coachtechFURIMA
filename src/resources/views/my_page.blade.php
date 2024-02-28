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
        <div class="my_page">
            <div class="profile">
                <div class="img">
                    @if(optional($profile)->img===null)
                    <p class="no_img"></p>
                    @else
                    <img class="now_img" src="{{Storage::disk('s3')->url(optional($profile)->img)}}">
                    @endif
                </div>
                <div class="name">
                    <h2>ユーザー名</h2>
                    <p class="now_name">{{optional($profile)['name']}}</p>
                </div>
                <div class="update">
                    <a class="update_link" href="mypage/profile">プロフィールを編集</a>
                </div>
            </div>
            <div class="item_link">
                @if(Request::is('mypage'))
                <a class="sell_item" href="/mypage">出品した商品</a>
                @else
                <a class="no_sell_item" href="/mypage">出品した商品</a>
                @endif
                @if(Request::is('mypage/buy'))
                <a class="buy_item" href="/mypage/buy">購入した商品</a>
                @else
                <a class="no_buy_item" href="/mypage/buy">購入した商品</a>
                @endif
            </div>
            <div class="item_list">
                @foreach($myPages as $myPage)
                @if($myPage->buy===null)
                <div class="content">
                    @if($myPage->shopSell===null)
                    <a class="detail" href="{{route('detail',$myPage->id)}}">
                        <img class="item_img" src="{{Storage::disk('s3')->url($myPage->img)}}">
                        <p class="amount">¥{{$myPage['amount']}}</p>
                    </a>
                    @else
                    <a class="detail" href="{{route('shopDetail',$myPage->id)}}">
                        <img class="item_img" src="{{Storage::disk('s3')->url($myPage->img)}}">
                        <p class="amount">¥{{$myPage['amount']}}</p>
                    </a>
                    @endif
                </div>
                @else
                <div class="content">
                    @if($myPage->shopSell===null)
                    <a class="detail" href="{{route('detail',$myPage->id)}}">
                        <img class="item_img" src="{{Storage::disk('s3')->url($myPage->img)}}">
                        <p class="amount">¥{{$myPage['amount']}}</p>
                        <p class="sold">sold out</p>
                    </a>
                    @else
                    <a class="detail" href="{{route('shopDetail',$myPage->id)}}">
                        <img class="item_img" src="{{Storage::disk('s3')->url($myPage->img)}}">
                        <p class="amount">¥{{$myPage['amount']}}</p>
                        <p class="sold">sold out</p>
                    </a>
                    @endif
                    @if($myPage->buy->payment==='クレジットカード払い')
                    <form class="stripe" action="{{route('stripe.charge',$myPage->id)}}" method="POST">
                        @csrf
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="{{ env('STRIPE_KEY') }}"
                            data-amount="{{$myPage->amount}}"
                            data-name="お支払い画面"
                            data-label="決済する"
                            data-description="決済情報を入力してください"
                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                            data-locale="auto"
                            data-currency="JPY">
                        </script>
                    </form>
                    @endif
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </main>
</body>
</htmL>