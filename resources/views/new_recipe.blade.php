<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/new_recipe.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header2')
</header>
<body>
    <div class="container">
        <h2 class="title">新規レシピ登録</h2>
        <form method="POST" action="{{ route('recipe_complete') }}" class="form">
            @csrf
            <div class="form-group">
                <label for="menu" class="label">レシピ名入力<br></label>
                <input type="text" id="menu" name="menu" class="input" placeholder="レシピ名を入力してください" required>
            </div>
            <div class="form-group">
                <label for="detail" class="label">レシピ内容入力<br></label>
                <input type="text" id="detail" name="detail" class="input" placeholder="レシピ内容を入力してください" required>
            </div>
            <button type="submit" class="submit-button">登録</button>
        </form>
        <button onclick="redirectToTop0()" class="back-link">戻る</button>
    </div>
</body>
<script>
        function redirectToTop0() {
            window.location.href = '/top0';
        }
    </script>
</html>

