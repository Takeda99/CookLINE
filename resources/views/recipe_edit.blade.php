<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/recipe_edit.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header2')
</header>
<body>
<body>
    <div class="container">
        <h2>レシピ編集</h2>

        <form action="{{ route('recipe_update', ['recipe_id' => $recipe->recipe_id]) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="menu">メニュー名</label>
                <input type="text" id="menu" name="menu" value="{{ $recipe->menu }}">
            </div>

            <div class="form-group">
                <label for="ingredient">材料</label>
                <textarea id="ingredient" name="ingredient" rows="3">{{ $recipe->ingredient }}</textarea>
            </div>

            <button type="submit" class="submit-button">更新</button>
        </form>
        
        <div class="link-container">
            <a href="#" onclick="redirectToTop0()" class="back-link">戻る</a>
        </div>
    </div>
</body>

<script>
    function redirectToTop0() {
        window.location.href = '/top0';
    }
</script>
</html>