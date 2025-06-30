<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

<head>

    @include('frontend.includes.head')


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

    
    {{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"> --}}

    {{-- <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">    
    </noscript> --}}


    @stack('css')

    <link rel="stylesheet" href="{{ asset('css/style.css') . '?v=' . rand(10, 1000) }}">



    @stack('js')

    <script src="{{ asset('js/script.js') . '?v=' . rand(10, 1000)  }}" defer></script>

</head>

<body>

    <div class="wrapper page-{{ $page }}">

        @include('frontend.includes.header')

        <main class="main">

            @yield('content')

        </main>

        @include('frontend.includes.footer')

    </div>


    @include('frontend.includes.modals')


</body>

</html>