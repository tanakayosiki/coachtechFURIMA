<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
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
                    <a class="comment_link" href="">
                        <img class="comment_img" src="{{asset('img/comment.svg')}}">
                    </a>
                </div>
                <div class="comment">
                    <form class="comment_form" action="{{route('postShopComment',[$item->id,$itemShop->id])}}" method="post">
                        @csrf
                        <div class="comment_list">
                            @foreach($comments as $comment)
                            @if(empty($comment->user->staff===null))
                            @if($comment->user->staff->shop_id===$itemShop->id)
                            <div class="by_user">
                                <div class="user_info">
                                    @if($comment->user->staff->shop->img===null)
                                    <p class="no_img"></p>
                                    <p class="name">{{$comment->user->staff->shop->name}}</p>
                                    @else
                                    <img class="user_img" src="{{Storage::url($comment->user->staff->shop->img)}}">
                                    <p class="name">{{$comment->user->staff->shop->name}}</p>
                                    @endif
                                </div>
                                <p class="content">{{$comment['comment']}}</p>
                            </div>
                            @else
                            <div class="user_info">
                                    @if(empty($comment->room->user->profile===null))
                                    @if(empty($comment->room->user->profile->img===null))
                                    <img class="user_img" src="{{Storage::url($comment->room->user->profile->img)}}">
                                    <p class="name">{{$comment->room->user->profile->name}}</p>
                                    @else
                                    <p class="no_img"></p>
                                    <p class="name">{{$comment->room->user->profile->name}}</p>
                                    @endif
                                    @else
                                    <p class="no_img"></p>
                                    <p class="no_name">名前なし</p>
                                    @endif
                                </div>
                                <p class="content">{{$comment['comment']}}</p>
                            </div>
                            @endif
                            @else
                            <div class="by_user">
                                <div class="user_info">
                                    @if(empty($comment->room->user->profile===null))
                                    @if(empty($comment->room->user->profile->img===null))
                                    <img class="user_img" src="{{Storage::url($comment->room->user->profile->img)}}">
                                    <p class="name">{{$comment->room->user->profile->name}}</p>
                                    @else
                                    <p class="no_img"></p>
                                    <p class="name">{{$comment->room->user->profile->name}}</p>
                                    @endif
                                    @else
                                    <p class="no_img"></p>
                                    <p class="no_name">名前なし</p>
                                    @endif
                                </div>
                                <p class="content">{{$comment['comment']}}</p>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <p class="new_comment">商品へのコメント</p>
                        <textarea name="comment" cols="30" value="{{old('comment')}}"></textarea>
                        <button class="button" type="submit">コメントを送信する</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>