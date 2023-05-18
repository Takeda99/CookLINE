<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login1.css') }}">
    <title>一般ログイン</title>
</head>
<header>
    @include('common.header1')
</header>
<body>
<div>
    @isset($email)
        <p>Email: {{ $email }}</p>
    @endisset

    @isset($password3)
        <p>Password3: {{ $password3 }}</p>
    @endisset

    @isset($password4)
        <p>Password4: {{ $password4 }}</p>
    @endisset
</div>

    <div class="login">
    <h1>一般ログイン</h1>

    <form method="POST"  action="{{ route('login_main') }}">
    @csrf
    <div class="form-group">
        <label for="email">メールアドレス入力<br></label>
        <input type="email" id="email" name="email" placeholder="メールアドレスを入力してください" required>
    </div>
    <div class="form-group">
        <label for="password">パスワード入力<br></label>
        <input type="password" id="password" name="password" placeholder="パスワードを入力してください" required>
    </div>
    <button type="submit">log in</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </div>
    <div class="a">
        <a href="{{ route('new1') }}">新規登録はこちら<br></a>
        <a href="{{ route('mail1') }}">パスワードを忘れた方はこちら</a>
    </div>
</body>
</html>