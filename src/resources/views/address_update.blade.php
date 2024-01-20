<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/address_update.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header"></header>
        <div class="address_update">
            <h1>住所の変更</h1>
            <form action="{{route('postAddress',$item->id)}}" method="post">
                @csrf
                <h2>郵便番号</h2>
                <input type="text" name="post_code" value="{{$profile['post_code']}}">
                <h2>住所</h2>
                <input type="text" name="address" value="{{$profile['address']}}">
                <h2>建物名</h2>
                <input type="text" name="building" value="{{optional($profile)['building']}}">
                <button type="submit">更新する</button>
            </form>
        </div>
    </main>
</body>
</html>