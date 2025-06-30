<header class="header">
    <div class="container">
        <div class="header__inner">
            @if (Route::is("home"))
                
            <img width="30" height="30" class="hero__logo" src="{{ asset('images/logo-min.svg') }}" alt="Логотип тимчасовий секрет">
            @else
            <a href="{{ route('home') }}">            
                <img width="30" height="30" class="hero__logo" src="{{ asset('images/logo-min.svg') }}" alt="Логотип тимчасовий секрет">
            </a>                
            @endif

            <nav id="nav-menu" class="nav-menu">
                <ul class="header-menu">
                    {{-- ? test home page --}}
                    @if (!Route::is('home'))
                        <li class="header-menu__item">                        
                            <a class="header-menu__link link" href="{{ route('home') }}">Головна</a>                                       
                        </li>
                    @endif
                    
                    {{-- ? test home page --}}
                    <li class="header-menu__item">
                        <a class="header-menu__link link" href="{{ route('about') }}">Про сервіс</a>
                    </li>
                </ul>

                @if (!auth('web')->check())
                    
                <div class="header-buttons">
                    <button class="header__btn btn-auth btn" type="button" data-target="sign-up">
                        <span>зареєструватись</span>
                    </button>
                    <button class="header__btn btn-auth btn" type="button" data-target="sign-in">
                        <span>вхід</span>
                    </button>
                </div>
                @endif

            </nav>
           {{-- ? auth-user --}}
           {{-- ? auth('web')->user() --}}
            @if (auth('web')->check())
                
            <div id="auth-user" class="auth-user">
                <button class="auth-user-btn" type="button">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.75 7.5C7.75264 8.62636 8.20126 9.70583 8.99771 10.5023C9.79417 11.2987 10.8736 11.7474 12 11.75C13.1264 11.7474 14.2058 11.2987 15.0023 10.5023C15.7987 9.70583 16.2474 8.62636 16.25 7.5C16.2474 6.37364 15.7987 5.29417 15.0023 4.49771C14.2058 3.70126 13.1264 3.25264 12 3.25C10.8736 3.25264 9.79417 3.70126 8.99771 4.49771C8.20126 5.29417 7.75264 6.37364 7.75 7.5ZM9.25 7.5C9.25 5.98 10.48 4.75 12 4.75C13.52 4.75 14.75 5.98 14.75 7.5C14.75 9.02 13.52 10.25 12 10.25C10.48 10.25 9.25 9.02 9.25 7.5ZM17.75 20C17.75 20.41 18.09 20.75 18.5 20.75C18.91 20.75 19.25 20.41 19.25 20V17.97C19.25 16.32 18.44 14.91 17.12 14.31C14.05 12.93 9.96 12.92 6.88 14.31C5.56 14.91 4.75 16.31 4.75 17.97V20C4.75 20.41 5.09 20.75 5.5 20.75C5.91 20.75 6.25 20.41 6.25 20V17.97C6.25 17.13 6.58 16.09 7.5 15.67C10.19 14.46 13.82 14.46 16.5 15.67C17.42 16.1 17.75 17.14 17.75 17.97V20Z" fill="white" />
                    </svg>
                </button>
                <div class="auth-user-box">
                    <div class="auth-user-col">
                        <div class="auth-user-row">
                            <span class="auth-user-label">Акаунт:</span>
                            <span class="auth-user-value">                            
                                {{ auth('web')->user()->account->plan->name }}
                            </span>
                        </div>

                        @if (auth('web')->user()->account->ends_at)
                        <div class="auth-user-row">
                            <span class="auth-user-label">Діє по:</span>                                
                            <span class="auth-user-value">
                                {{ auth('web')->user()->account->ends_at->format('d-m-Y') }}
                            </span>
                        </div>
                        @endif

                    </div>
                    <a class="auth-user__link btn" href="{{ route('user.logout') }}">
                        <span>Вихід</span>
                    </a>
                </div>
            </div>
            @endif
            {{-- ? auth-user --}}

            <button id="burger-menu" class="burger-menu" type="button">
                <span></span>
            </button>
        </div>
    </div>
</header>