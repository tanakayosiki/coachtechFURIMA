<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
    <title>FURIMA</title>
</head>
<body>
    <main class="main">
        <header class="header"></header>
        <div class="sell">
            <h1 class="sell_header">商品の出品</h1>
            <form class="form" action="{{route('sell',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <h3>商品画像</h3>
                    <input class="img" type="file" name="img">
                    @error('img')
                    <p class="error">{{$errors->first('img')}}</p>
                    @enderror
                    <p class="req">※必須</p>
                <div class="overview">
                <h2>商品の詳細</h2>
                <h3>カテゴリー</h3>
                        <input class="input" type="text" name="category" value="{{old('category')}}">
                        @error('category')
                        <p class="error">{{$errors->first('category')}}</p>
                        @enderror
                        <p class="req">※必須</p>
                <h3>商品の状態</h3>
                        <input class="input" type="text" name="situation" value="{{old('situation')}}">
                        @error('situation')
                        <p class="error">{{$errors->first('situation')}}</p>
                        @enderror
                        <p class="req">※必須</p>
                </div>
                <div class="overview">
                <h2>商品名と説明</h2>
                <h3>商品名</h3>
                        <input class="input" type="text" name="name" value="{{old('name')}}">
                        @error('name')
                        <p class="error">{{$errors->first('name')}}</p>
                        @enderror
                        <p class="req">※必須</p>
                <h3>ブランド名</h3>
                        <input class="input" type="text" name="brand" value="{{old('brand')}}">
                <h3>商品の説明</h3>
                    <textarea class="detail" name="detail" cols="30" value="{{old('detail')}}"></textarea>
                    @error('detail')
                    <p class="error">{{$errors->first('detail')}}</p>
                    @enderror
                    <p class="req">※必須</p>
                </div>
                <div class="overview">
                <h2>販売価格</h2>
                <h3>販売価格</h3>
                    <input class="input" type="text" name="amount" value="{{old('amount')}}">
                    @error('amount')
                    <p class="error">{{$errors->first('amount')}}</p>
                    @enderror
                    <p class="req">※必須</p>
                </div>
                <button class="submit" type="submit">出品する</button>
            </form>
        </div>
    </main>
</body>
</html>