<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/top_admin.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        @include('common.header2')
    </header>
    <main>
        <h2 class="admin-heading">管理</h2>
        <div class="admin-panel">
            <a href="{{ route('admin_list') }}" class="admin-link">ユーザー一覧</a>
            <a href="{{ route('admin_log') }}" class="admin-link">使用ログ確認</a>
        </div>
    </main>
</body>
</html>
