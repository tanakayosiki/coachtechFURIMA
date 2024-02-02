<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/staff_delete.css') }}">
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
        <div class="staff_delete">
            <h1>スタッフ削除</h1>
                @foreach($staffs as $staff)
                <form class="form" action="{{route('staffDelete',$staff->id)}}" method="get">
                @if(empty($staff->user->id===$user->id))
                <div class="staff_list">
                    @if($staff->user->profile===null)
                    <p class="no_name">名前なし</p>
                    @else
                    <p class="name">{{$staff->user->profile->name}}</p>
                    @endif
                    <button class="submit" type="submit">削除する</button>
                </div>
                @endif
                </form>
                @endforeach
        </div>