<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_delete.css') }}">
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
        <div class="admin_delete">
            <h1>ユーザー一覧</h1>
            <p class="message">{{session('message')}}</p>
            <div class="list_title">
                <p class="item">名前</p>
                <p class="item">メールアドレス</p>
            </div>
            @foreach($users as $user)
            @if(empty($user->id===$admin->id))
            <div class="user_list">
                <form class="form" action="{{route('adminDelete',$user->id)}}" method="get">
                @if(empty($user->profile===null))
                <p class="name">{{$user->profile->name}}</p>
                <p class="email">{{$user->email}}</p>
                @else
                <p class="no_name">名前なし</p>
                <p class="email">{{$user->email}}</p>
                @endif
                <button class="submit" type="submit">削除する</button>
                </form>
            </div>
            @endif
            @endforeach
        </div>
</body>
</html>