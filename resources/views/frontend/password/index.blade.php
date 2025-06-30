<!DOCTYPE html>
<html lang="{{app()->currentLocale()}}">

<head>

    <meta name="robots" content="noindex"> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('seo.' . $page . '.title') }}</title>

    <meta name="image" content="{{ asset('favicon-32x32.png') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __('seo.' . $page . '.title') }}">
    <meta property="og:image" content="{{ asset('favicon-32x32.png') }}">
   

    <meta name="msapplication-TileColor" content="#fff">
    <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png"') }}">
    <meta name="theme-color" content="#fff">
    <meta name="application-name" content="{{ __('seo.' . $page . '.title') }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">


 

    <link rel="stylesheet" href="{{ asset('css/style.css') . '?v=' . rand(10, 1000) }}">
   
    <script src="{{ asset('js/script.js') . '?v=' . rand(10, 1000)  }}" defer></script>

</head>

<body>

    <div class="wrapper page-{{ $page }}">

        <div class="header">
            <div class="container">
                <div class="header__inner">
                    <a href="{{ route('home') }}">
                        <img width="30" height="30" class="hero__logo" src="{{ asset('images/logo-min.svg') }}" alt="Логотип тимчасовий секрет">
                    </a>
                </div>
            </div>
        </div>
        
    
        <main class="main">


            <section class="pass-reset">

                <div class="container">

                    <div id="pass-reset-box" class="pass-reset-box">

                        <div class="preloader">
                            <svg class="svg-spin" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <circle class="svg-spin-circle-1" cx="4" cy="12" r="3" />
                                <circle class="svg-spin-circle-2" cx="12" cy="12" r="3" />
                                <circle class="svg-spin-circle-3" cx="20" cy="12" r="3" />
                            </svg>   
                        </div>

                        <form id="form-pass-reset" class="form form-pass-reset" action="{{ route('password.reset.post', $token) }}">
                            
                            <input id="token-forgot" type="hidden" name="token_forgot" value="{{ $token }}">

                            <span class="form-title">Зміна пароля</span>
                            <div class="form-group">
                                <span class="form-text">Введіть ваш email та новий пароль.</span>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Email</span>
                                <input id="email-reset" type="email" class="form-input" autocomplete="off" name="email">
                            </div>

                            <div class="form-group">
                                <span class="form-label">Новий пароль</span>
                                {{-- <input id="pass-reset" type="password" class="form-input" autocomplete="off" name="password"> --}}
                                <div class="form-pass-generate">
                                    <div class="form-group-pass">
                                        <button class="btn-pass-show" type="button">
                                            <span class="btn-pass-show-icon btn-pass-show-icon-hidden">
                                                <svg width="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                </svg>                                
                                            </span>
                                            <span class="btn-pass-show-icon btn-pass-show-icon-show">
                                                <svg width="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </span>
                                        </button>
    
                                        <input id="pass-reset" type="password" class="form-input" autocomplete="off" name="password">
                                    </div>
                                    <button type="button" class="btn-pass-generate" data-text="Згенерувати пароль">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                        </svg>
                                    </button>

                                </div>
                                <span class="form-label-desc">мін. 10 символів</span>
                            </div>

                            <button id="btn-send-pass-reset" type="button" class="btn-send-pass-reset btn"><span>Змінити пароль</span></button>
                            
                        </form>

                        <div class="message-success">            
                            <span class="message-success__title">                
                                Пароль успішно змінений!            
                            </span>          
        
                            <a class="message-success__link link" href="{{ route('home') }}">Повернутись на головну</a>
                        </div>
        
                        <div class="message-error"></div>
                       
                    </div>
                    
                </div>

            </section>

        </main>

        <footer class="footer">
            <div class="container">                
                <div class="footer-bottom">
                    <span class="copiright">© 2025. Всі права захищені.</span>

                    <a class="website link" href="{{ route('home') }}">timesecret.com.ua</a>
                </div>

            </div>
        </footer>
    </div>





</body>

</html>

