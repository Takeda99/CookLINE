<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    @include('common.header1')
</header>
<body>
    <h2>パスワード再設定</h2>
    <p>新しいパスワードを作成してください</p>
    <form method="POST"  action="{{ route('mail1_3') }}">
        @csrf
        <div class="form-group">
            <label for="email">パスワードを変更するメールアドレス入力<br></label>
            <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください" required>
        </div>
        <div class="form-group">
            <label for="password">パスワード入力<br></label>
            <input type="password" id="password" name="password" placeholder="パスワードを入力してください" required>
        </div>
        <div class="form-group">
            <label for="password">パスワード再入力<br></label>
            <input type="password" id="password2" name="password2" placeholder="パスワードを再入力してください" required>
        </div>
        <div class="form-group">
            <label for="password">リセットコード入力<br></label>
            <input type="text" id="password3" name="password3" placeholder="パスワードを再入力してください" required>
        </div>
        <button type="submit">送信</button>
    </form>
</body>
</html>