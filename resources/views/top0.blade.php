<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/top0.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header2')
</header>
<body>
    <div class="container">
        <div class="new-recipe">
            <a href="{{ route('new_recipe') }}">新規レシピ登録はこちら→</a>
        </div>
        <div class="h_box">
            <h2 class="list">登録メニュー一覧</h2>
        </div>

        @foreach ($recipes as $recipe)
            <div class="recipe">
                <h2>{{ $recipe->menu }}</h2>
                <p style="white-space: pre-line;">{{ $recipe->ingredient }}</p>
                <div class="buttons">
                    <form action="{{ route('recipe_edit', ['recipe_id' => $recipe->recipe_id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="edit-button">編集</button>
                    </form>
                    <form action="{{ route('delete_recipe', ['recipe_id' => $recipe->recipe_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete?')">削除</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>



</html>