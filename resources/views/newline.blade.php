<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/newline.css') }}">
    <title>Document</title>
</head>
<header>
    @include('common.header1')
</header>
<body>
    <div class="container">
        <div class="message">
            <p>LINEと連携してスタート</p>
            <a href="{{ url('newline') }}">LINEと連携</a>
        </div>
    </div>
</body>
</html>
