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
    <meta property="og:url" content="{{ route('secret.show', $key) }}">
   

    <meta name="msapplication-TileColor" content="#fff">
    <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png"') }}">
    <meta name="theme-color" content="#fff">
    <meta name="application-name" content="{{ __('seo.' . $page . '.title') }}">

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') . '?v=' . rand(10, 1000) }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') . '?v=' . rand(10, 1000) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') . '?v=' . rand(10, 1000) }}">

 

    <link rel="stylesheet" href="{{ asset('css/secret-show.css') . '?v=' . rand(10, 1000) }}">
   
    <script src="{{ asset('js/secret-show.js') . '?v=' . rand(10, 1000)  }}" defer></script>

</head>

<body>

    <div class="wrapper page-secret">

    

        <main class="main">

            <section class="secret">
                <div class="container">

                    @if ($secret)
                        
                    <div id="secret-info" class="secret-info">

                        <div class="secret-info-top">

                            <h1 class="secret-info__title">Для вас є повідомлення!</h1>
                            


                            <p class="secret-info__text">
                                <span class="color-red">Важливо!</span>
                                <br>
                                Повідомлення можна побачити лише один раз.
                                <br>
                                Після натискання кнопки "подивитись", повідомлення буде назавжди видалено з нашого сервісу.
                            </p>


                            <form id="form-secret-info" class="form-secret-info" action="{{ route('secret.show.delete', $secret->key) }}">

                                @if ($secret->passphrase)                                    
                               
                                <div class="form-group">
                                    <span class="form-label-title">Потрібна парольна фраза</span>
                                    {{-- <input id="passphrase" type="password" class="form-input" autocomplete="off" name="passphrase"> --}}
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
                                        <input id="passphrase" type="password" class="form-input" autocomplete="off" name="passphrase">                           
                                    </div>
                                </div>
                                    
                                @endif



                                <button id="secret-btn-show" class="secret__btn-show btn" type="button">
                                    <span>подивитись</span>
                                </button>

                                <div class="message"></div>
                            </form>


                        </div>



                    </div>

                    <div id="preloader-secret" class="preloader-secret">        
                        <svg class="svg-spin" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">            
                            <circle class="svg-spin-circle-1" cx="4" cy="12" r="3" />            
                            <circle class="svg-spin-circle-2" cx="12" cy="12" r="3" />            
                            <circle class="svg-spin-circle-3" cx="20" cy="12" r="3" />        
                        </svg>    
                    </div>

                   
                   
                    <div id="secret-show" class="secret-show">
                        <span class="secret-show__title">Повідомлення</span>                           
                        <div class="secret-show-wrap" data-copy-text="Cкопійовано!">                     
                            <textarea  id="secret-show-textarea" class="secret-show-textarea" autocomplete="off" spellcheck="false" readonly></textarea>
                        </div>
                        <span class="secret-show__text">
                            Обов'язково скопіюйте повідомлення, ви побачите його лише один раз.
                        </span>
                        <button id="secret-btn-copy" class="secret__btn-copy btn">
                            <span>скопіювати</span>
                        </button>
                    </div> 
                   

                    @else
                        
                    <div class="no-secret">

                        <span class="no-secret-icon">
                            <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </span>

                        <span class="no-secret__title">
                            Інформація більше не доступна <br> або ніколи не існувала
                        </span>                      

                        <div class="no-secret-links">
                            <a class="no-secret__link link" href="{{ route('about') }}">Про сервіс</a>
                            {{-- <a class="no-secret__link link" href="{{ route('home') }}">Створити секрет</a> --}}
                        </div>
                    </div> 

                    @endif









                </div>
            </section>









        </main>

        <footer class="footer">
            <div class="container">                
                <div class="footer-bottom">
                    <span class="copiright">© {{ now()->format('Y') }}. Всі права захищені.</span>

                    <a class="website link" href="{{ route('home') }}">timesecret.com.ua</a>
                </div>

            </div>
        </footer>
    </div>





</body>

</html>
