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
        <div class="comment_list">
            @foreach($rooms as $room)
            <div class="room">
                @if($room->user->profile===null)
                <p class="no_name">名前なし</p>
                <a class="room_link" href="{{route('staffComment',$room->id)}}">コメントを見る</a>
                @else
                <p>{{$room->user->profile->name}}</p>
                <a class="room_link" href="{{route('staffComment',$room->id)}}">コメントを見る</a>
                @endif
            </div>
            @endforeach
        </div>