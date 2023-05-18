<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin_log.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header2')
</header>
<body>
<div class="container">
    <h2>ログ一覧</h2>

    <a href="javascript:history.back()" class="back-link">戻る</a>

    @foreach ($logs as $log)
        <div class="log">
            <div class="log-item">
                <p class="log-email">{{ $log->user->email }}</p>
                <p class="log-action">{{ $log->action->action_name }}</p>
                <p class="log-time">{{ $log->time_at }}</p>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
