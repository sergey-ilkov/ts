<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Сторінки не існує</title>

    <meta name="theme-color" content="#171717">
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') . '?v=' . rand(10, 1000) }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') . '?v=' . rand(10, 1000) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') . '?v=' . rand(10, 1000) }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/error-page.css') . '?v=' . rand(10, 1000) }}">
    
    <script src="{{ asset('js/error-page.js') . '?v=' . rand(10, 1000) }}" defer></script>
    
</head>
<body>
    <div class="wrapper page-error">

        <div class="error-box">
            <span class="error-code">404</span>
            <span class="error-text">такої сторінки не існує</span>
            <a class="link" href="{{ route('home') }}">Повернутись на головну</a>
        </div>
        
    </div>
</body>
</html>