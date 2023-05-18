<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/recipe_complete.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header1')
</header>
<body>
    <div class="container">
        <h2 class="title">登録されていないメールアドレスですはじめからやり直してください</h2>
        <a href="#" onclick="redirectToTop0()" class="back-link">戻る</a>
    </div>
</body>
<script>
    function redirectToTop0() {
        window.location.href = '/top0';
    }
</script>
</html>