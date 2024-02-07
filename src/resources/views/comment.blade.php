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
        <div class="detail">
            <div class="img">
                <img class="img_path" src="{{Storage::disk('s3')->url($item->img)}}">
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
                <div class="count">
                        <p class="nice_count">{{$item->nices->count()}}</p>
                        <p class="comment_count">{{$item->comments->count()}}</p>
                </div>
                <div class="comment">
                    <form class="comment_form" action="{{route('postComment',$item->id)}}" method="post">
                        @csrf
                        <div class="comment_list">
                            @foreach($comments as $comment)
                            <div class="by_user">
                                <div class="user_info">
                                    @if($comment->user->profile===null)
                                    <p class="no_img"></p>
                                    <p class="no_name">名前なし</p>
                                    @else
                                    @if($comment->user->profile->img===null)
                                    <p class="no_img"></p>
                                    @else
                                    <img class="user_img" src="{{Storage::disk('s3')->url($comment->user->profile->img)}}">
                                    @endif
                                    <p class="name">{{$comment->user->profile->name}}</p>
                                    @endif
                                    @if($user->id===$itemUser->id)
                                    <a class="delete" href="{{route('deleteComment',$comment->id)}}">削除</a>
                                    @endif
                                </div>
                                <p class="content">{{$comment['comment']}}</p>
                            </div>
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