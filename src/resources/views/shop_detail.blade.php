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
        <div class="detail">
            <div class="img">
                <img class="img_path" src="{{Storage::disk('s3')->url($item->img)}}">
            </div>
            <div class="overview">
                <div class="name">
                    <p class="item_name">{{$item->name}}</p>
                    <p class="brand">{{$item->brand}}</p>
                </div>
                <p class="amount">¥{{$item->amount}}</p>
                <div class="option">
                    @if($item->is_liked_by_auth_user())
                    <div class="nice">
                        <a class="star" href="{{route('unnice',$item->id)}}">
                        </a>
                    </div>
                    @else
                    <div class="nice">
                        <a class="off_star" href="{{route('nice',$item)}}"></a>
                    </div>
                    @endif
                    @if(empty(optional($user)->staff===null))
                    @if($user->staff->shop_id===$itemShop->id)
                    <a class="comment_link" href="{{route('commentList',$item->id)}}">
                        <img class="comment_img" src="{{asset('img/comment.svg')}}">
                    </a>
                    @else
                    <a class="comment_link" href="{{route('shopComment',$item->id)}}">
                        <img class="comment_img" src="{{asset('img/comment.svg')}}">
                    </a>
                    @endif
                    @else
                    <a class="comment_link" href="{{route('shopComment',$item->id)}}">
                        <img class="comment_img" src="{{asset('img/comment.svg')}}">
                    </a>
                    @endif
                </div>
                <div class="count">
                    <p class="nice_count">{{$item->nices->count()}}</p>
                </div>
                <div class="button">
                    @if(empty($item->shopSell->shop_id===optional($shop)->id))
                    @if($item->buy===null)
                    <form action="{{route('buy',$item->id)}}" method="get">
                        <button class="buy" type="submit">購入する</button>
                    </form>
                    @else
                    <button class="buy" disabled>購入する</button>
                    @endif
                    @endif
                </div>
                <div class="explanation">
                    <h2>商品説明</h2>
                    <p class="item_detail">{{$item->detail}}</p>
                </div>
                <div class="info">
                    <h2>商品の情報</h2>
                    <div class="info_content">
                        <h3>カテゴリー</h3>
                        <p class="category">{{$item->category}}</p>
                    </div>
                    <div class="info_content">
                        <h3>商品の状態</h3>
                        <p class="situation">{{$item->situation}}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>