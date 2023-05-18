<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/top1.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        @include('common.header1')
    </header>
    <div class="container">
        <div class="message">
            <h2>管理者ユーザー作成完了</h2>
            <a href="{{ route('login2') }}">ログイン画面に移る</a>
        </div>
    </div>
</body>
</html>