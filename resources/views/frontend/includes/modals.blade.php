
{{-- ? info created secret --}}
<div id="modal-secret-info" class="modal modal-secret-info">

    <div class="preloader">
        <svg class="svg-spin" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <circle class="svg-spin-circle-1" cx="4" cy="12" r="3" />
            <circle class="svg-spin-circle-2" cx="12" cy="12" r="3" />
            <circle class="svg-spin-circle-3" cx="20" cy="12" r="3" />
        </svg>
    </div>

    <div class="modal-body">

        <div id="secret-info" class="secret-info">

            <button class="btn-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>


            <div class="message-secret-info"></div>
  

            <div class="secret-info-content">
                <div class="secret-info-box">
                    <span class="secret-info__title">Секрет успішно створений!</span>
                    <span class="secret-info__subtitle">скопіюйте посилання щоб поділитись</span>
                </div>

                <div class="secret-info-box">
                    <span class="secret-info-box__title">Посилання</span>
                    <div id="secret-info-link" class="secret-info-link" data-copy-text="Cкопійовано!"></div>
                    <button id="secret-info-btn-copy" class="secret-info-btn-copy btn btn-2">
                        <span>скопіювати</span>
                    </button>
                </div>

                <div class="secret-info-box">
                    <span class="secret-info-box__title">Безпека</span>
                    <span class="secret-info__text">
                         Секрет видаляється із сервісу назавжди після першого перегляду або після закінчення терміну зберігання.
                        {{-- Секрет можна побачити лише один раз за цим посиланням.                         --}}
                        {{-- <br>
                        Секрет видаляється із сервісу назавжди після першого перегляду або після закінчення терміну зберігання. --}}
                    </span>
                </div>

                <div class="secret-info-box">
                    <span class="secret-info-box__title">Хронологія</span>
                    <div class="secret-info-group-wrap">
                        <div class="secret-info-group">
                            <span class="secret-info-group__title">створено:</span>
                            <span id="secret-info-created" class="secret-info-group__text"></span>
                        </div>
                        <div class="secret-info-group">
                            <span class="secret-info-group__title">видалення:</span>
                            <span id="secret-info-deleted" class="secret-info-group__text"></span>
                        </div>
                    </div>
                </div>


                <button id="secret-btn-new" class="secret-info-btn-new btn">
                    <span>створити новий секрет</span>
                </button>

            </div>
        </div>

    </div>

</div>


@if (!auth('web')->user())
    
{{-- ? auth users --}}
<div id="modal-auth" class="modal modal-auth">
    <div class="modal-body"> 
        <button class="btn-modal-close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button> 
        
        <div class="modal-preloader">
            <svg class="svg-spin" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <circle class="svg-spin-circle-1" cx="4" cy="12" r="3" />
                <circle class="svg-spin-circle-2" cx="12" cy="12" r="3" />
                <circle class="svg-spin-circle-3" cx="20" cy="12" r="3" />
            </svg>   
        </div>

        
        <form id="sign-up" class="auth-form" action="{{ route('user.register') }}">
            <span class="form-title">Реєстрація</span>            
            <div class="form-row">
                <div class="form-group">
                    <span class="form-label">Email</span>
                    <input id="email-validation" type="email" class="form-input" placeholder="example@gmail.com" autocomplete="off" name="email">
                </div>
                <button id="btn-auth-send-code" type="button" class="btn-auth-send-code btn"><span>Отримати код</span></button>
            </div>
            <div class="form-group">
                <span class="form-label">Код підтвердження Email</span>
                <input type="text" class="form-input" placeholder="0000" autocomplete="off" name="code">
                <span class="form-label-desc">відправляється на пошту</span>
            </div>

            <div class="form-group">                
                <span class="form-label">Пароль</span>
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
                        <input type="password" class="form-input" autocomplete="off" name="password">                            
                    </div>

                    <button type="button" class="btn-pass-generate" data-text="Згенерувати пароль">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                    </button>
                </div>
                <span class="form-label-desc">мін. 10 символів</span>
            </div>

        
            <div class="form-group form-group-checkbox">                
                <input id="agree" type="checkbox" class="form-input" autocomplete="off" name="agree">                
                <label for="agree">
                    <span>Я погоджуюсь з 
                        <a class="link" href="{{ route('terms') }}">Умовами</a> та 
                        <a class="link" href="{{ route('privacy') }}">Політикою конфіденційності</a>
                    </span>
                </label>
            </div>

           <button id="btn-auth-sign-up" type="button" class="btn-auth-sign-up btn"><span>Зареєструватись</span></button>

           <div class="message-sign-up"></div>
           
        </form>

        <form id="sign-in" class="auth-form" action="{{ route('user.login') }}">
            <span class="form-title">Вхід</span>
            
            <div class="form-group">
                <span class="form-label">E-mail</span>
                <input type="email" class="form-input" autocomplete="off" name="email">
            </div>           
            <div class="form-group">
                <span class="form-label">Пароль</span>                
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

                    <input type="password" class="form-input" autocomplete="off" name="password">
                </div>
            </div>



            <div class="buttons-group">
                <button id="btn-auth-sign-in" type="button" class="btn-auth-sign-in btn"><span>Увійти</span></button>
    
                <button id="btn-modal-password-reset" type="button" class="btn-modal-password-reset link" data-target="modal-password-reset">
                    <span>Відновити пароль</span>        
                </button>
            </div>
                      
        </form>
        
        <div class="message-error"></div>

    </div>
</div>

{{-- ? modal password reset --}}
<div id="modal-password-reset" class="modal modal-password-reset">
    <div class="modal-body"> 
        <button class="btn-modal-close">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button> 
        
        <div class="modal-preloader">
            <svg class="svg-spin" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <circle class="svg-spin-circle-1" cx="4" cy="12" r="3" />
                <circle class="svg-spin-circle-2" cx="12" cy="12" r="3" />
                <circle class="svg-spin-circle-3" cx="20" cy="12" r="3" />
            </svg>   
        </div>
     

        <form id="form-password-reset" class="form form-password-reset" action="{{ route('password.forgot.post') }}">
            <span class="form-title">Відновлення паролю</span>
            
            <div class="form-group">
                
                <span class="form-text">Введіть ваш e-mail.</span>
                <span class="form-text">Ми надішлемо вам посилання на відновлення паролю.</span>
                
            </div>          
            <div class="form-group">
                <span class="form-label">E-mail</span>
                <input id="email-password-reset" type="email" class="form-input" autocomplete="off" name="email">
            </div>          

            <button id="btn-send-password-reset" type="button" class="btn-password-reset btn"><span>Отримати посилання</span></button>
            
                      
        </form>

        <div class="message-success">
            <span class="message-success__title">
                Посилання для зміни паролю відправлено на вашу пошту.
            </span>
            <div class="message-success-group">
                <span class="message-succes-text color-red">Важливо!</span>
                <span class="message-succes-text">Посилання діє 5 хвилин.</span>
            </div>
        </div>
        <div class="message-error">Error</div>

    </div>
</div>


@endif