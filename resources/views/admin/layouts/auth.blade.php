<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Admin panel') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/admin/favicon.png') }}">

 


    <link rel="stylesheet" href=" {{ asset('css/admin/admin.css') . '?v=' . rand(10, 1000)  }}  ">

</head>

<body>
    <div class="wrapper">

        <div class="main">

            <section class="auth-login">

                @yield('auth-content')

            </section>

        </div>






    </div>





</body>

</html>