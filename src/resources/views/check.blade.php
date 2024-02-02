<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/check.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header">
            <a class="page_title" href="/">
                <p>
                    <img  class="logo" src="{{asset('img/logo_img.svg')}}">
                </p>
                <p>
                    <img  class="title" src="{{asset('img/coachtech_img.png')}}">
                </p>
            </a>
        </header>
        <div class="check">
            <h1>やり取り一覧</h1>
            <p class="message">{{session('message')}}</p>
            <div class="list_title">
                <p class="item">店舗名</p>
                <p class="item">ユーザー名</p>
            </div>
            @foreach($rooms as $room)
            <div class="check_list">
                <p class="shop_name">{{$room->shop->name}}</p>
                @if($room->user->profile===null)
                <p class="no_name">名前なし</p>
                @else
                <p class="user_name">{{$room->user->profile->name}}</p>
                @endif
                <a class="room_link" href="{{route('checkComment',$room->id)}}">確認する</a>
            </div>
            @endforeach
        </div>