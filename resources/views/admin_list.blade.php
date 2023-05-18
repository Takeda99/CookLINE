<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_list.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        @include('common.header2')
    </header>
    <main>
        <h2 class="user-heading">ユーザー一覧</h2>
        <a href="javascript:history.back()" class="back-link">戻る</a>
        <div class="user-list">
        @foreach ($users as $user)
            <div class="user-item">
                @if ($user->admin == 1)
                    <p class="user-name" style="color:#00c300;">管理者</p>
                @endif
                <p class="user-email">{{ $user->email }}</p>
                @if ($user->admin == 0)
                    <p class="user-recipes">レシピ数: {{ $user->recipes_count }}</p>
                @endif
            </div>
        @endforeach


        </div>

    </main>
</body>
</html>
