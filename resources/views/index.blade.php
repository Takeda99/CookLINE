<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header1.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header1')
</header>
<body>
    @isset($password)
        <p>Password: {{ $password }}</p>
    @endisset

    @isset($password2)
        <p>Password2: {{ $password2 }}</p>
    @endisset
    <div class="explanation">
        <h1>Cook LINE</h1>
        <p>CookLineは、レシピをWebに保存し、LINEで手軽に参照できるサービスです。料理名をLINEで入力するだけで、必要なレシピがすぐに手元に。あなたの料理時間をシンプルに、楽しくします。</p>
    </div>
    <div class="type">
        <div class="type_login">
            <a href="{{ route('login1') }}" class="general">一般<br>ログイン</a>
        </div>

        <div class="type_login">
            <a href="{{ route('login2') }}" class="admin">管理者<br>ログイン</a>
        </div>
    </div>
    <div class="cook_mam">
        <div class="mam_text">
            <p>一般ユーザーの方は一般をクリックして、レシピへのスピーディなアクセスを体験しましょう！</p>
        </div>
        <img class="mam" src="{{ asset('images/cook_mam.png') }}">
    </div>
    <div class="LINE_QR">
        <h2>LINEの友達追加はこちら</h2>
        <img class="mam" src="{{ asset('images/LINE_QR.png') }}">
    </div>
</body>
</html>