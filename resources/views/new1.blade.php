<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new1.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header1')
</header>
<body>
    <div class="login">
        <h1>新規アカウント作成</h1><h1>(一般)</h1>
        <form method="POST" action="/registerx">
        @csrf
            <div class="form-group">
                <label for="email">メールアドレス入力<br></label>
                <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください" required>
            </div>
            <div class="form-group">
                <label for="password">パスワード入力<br></label>
                <input type="password" id="password" name="password" placeholder="パスワードを入力してください" required>
            </div>
            <div class="form-group">
            <label for="password">パスワード再入力<br></label>
            <input type="password" id="password2" name="password_confirmation" placeholder="パスワードを再入力してください" required>
        </div>
        <button type="submit">次へ</button>
        </form>
    </div>
</body>
</html>