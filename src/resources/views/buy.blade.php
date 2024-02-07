<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buy.css') }}">
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
        <div class="buy">
            <p class="message">{{session('message')}}</p>
        <form action="{{route('postBuy',$item->id)}}" method="post">
            @csrf
            <div class="left_screen">
                <div class="item_info">
                    <img class="item_img" src="{{Storage::disk('s3')->url($item->img)}}">
                    <div class="name_amount">
                        <p class="name">{{$item['name']}}</p>
                        <p class="amount">¥{{$item['amount']}}</p>
                    </div>
                </div>
                <div class="payment_address">
                    <div class="payment">
                        <h2>支払い方法</h2>
                        <label>
                        <select class="select" name="payment" value="{{old('payment')}}">変更する
                            <option value=""></option>
                            <option value="コンビニ払い">コンビニ払い</option>
                            <option value="クレジットカード払い">クレジットカード払い</option>
                            <option value="代引き">代引き</option>
                        </select>
                        </label>
                    </div>
                    <div class="address">
                        <h2>配送先</h2>
                        <a class="update" href="{{route('address',$item->id)}}">変更する</a>
                    </div>
                </div>
            </div>
            <div class="right_screen">
                <div class="confirm">
                    <div class="item_amount">
                        <span class="amount_payment">商品代金</span>
                        <span class="content">¥{{$item['amount']}}</span>
                    </div>
                    <div class="total">
                        <span class="amount_payment">支払い金額</span>
                        <span class="content">¥{{$item['amount']}}</span>
                    </div>
                    <div class="payment_confirm">
                        <span class="amount_payment">支払い方法</span>
                        <span class="content"></span>
                    </div>
                </div>
                    <button class="button" type="submit">購入する</button>
            </div>
        </form>
        </div>
    </main>
</body>
</html>