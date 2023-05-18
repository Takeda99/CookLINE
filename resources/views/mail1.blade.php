<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/email1.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header1')
</header>
<body>
    <div class="re">
        <h2>パスワード再設定</h2>
        <p>パスワードを忘れたメールアドレスを入力してください再設定コードをメールに送ります</p>
        <form method="POST"  action="{{ route('mail1_2') }}">
            @csrf
            <div class="form-group">
                <label for="email">メールアドレス入力<br></label>
                <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください" required>
            </div>
            <button type="submit">送信</button>
        </form>
    </div>
</body>
</html>
