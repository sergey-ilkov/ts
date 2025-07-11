@extends('frontend.layouts.base')


@section('content')


<section class="hero">
    <div class="container">
        <div class="hero__inner">
            <div id="svg-magic-wrap" class="svg-magic-wrap">
                <svg id="svg-magic" class="svg-magic" viewBox="0 0 400 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <mask id="svg-magic-mask">
                        <rect fill="#fff" x="0" y="0" width="400" height="60" />
                        <path d="M24.462 54.544C19.9233 54.544 16.6057 53.4957 14.509 51.399C12.4123 49.3023 11.364 45.997 11.364 41.483V23.464H6.961C5.65367 23.464 5 22.8103 5 21.503C5 20.2203 5.65367 19.579 6.961 19.579H11.364V11.624C11.364 10.3167 12.0053 9.663 13.288 9.663C14.5953 9.663 15.249 10.3167 15.249 11.624V19.579H24.536C25.8187 19.579 26.46 20.2203 26.46 21.503C26.46 22.8103 25.8187 23.464 24.536 23.464H15.249V41.483C15.249 44.9363 15.915 47.329 17.247 48.661C18.6037 49.993 21.0087 50.659 24.462 50.659C25.1773 50.659 25.683 50.8193 25.979 51.14C26.2997 51.4607 26.46 51.9417 26.46 52.583C26.46 53.8903 25.794 54.544 24.462 54.544Z" />
                        <path d="M37.8115 12.845C36.1095 12.845 35.2585 11.9693 35.2585 10.218V8.553C35.2585 6.851 36.1095 6 37.8115 6H39.4765C41.1292 6 41.9555 6.851 41.9555 8.553V10.218C41.9555 11.9693 41.1292 12.845 39.4765 12.845H37.8115ZM38.6625 54.544C37.3551 54.544 36.7015 53.8903 36.7015 52.583V21.503C36.7015 20.2203 37.3551 19.579 38.6625 19.579C39.9452 19.579 40.5865 20.2203 40.5865 21.503V52.583C40.5865 53.8903 39.9452 54.544 38.6625 54.544Z" />
                        <path d="M93.5896 19.505C97.5609 19.505 100.398 20.5163 102.1 22.539C103.826 24.5617 104.69 27.904 104.69 32.566V52.657C104.69 53.9397 104.048 54.581 102.766 54.581C101.458 54.581 100.805 53.9397 100.805 52.657V32.566C100.805 29.31 100.25 26.9667 99.1396 25.536C98.0296 24.1053 96.1796 23.39 93.5896 23.39H90.5186C87.2872 23.39 84.9686 24.1053 83.5626 25.536C82.1812 26.9667 81.4906 29.31 81.4906 32.566V52.657C81.4906 53.9397 80.8492 54.581 79.5666 54.581C78.2592 54.581 77.6056 53.9397 77.6056 52.657V32.566C77.6056 29.31 77.0506 26.9667 75.9406 25.536C74.8306 24.1053 72.9806 23.39 70.3906 23.39H67.3196C64.0882 23.39 61.7696 24.1053 60.3636 25.536C58.9822 26.9667 58.2916 29.31 58.2916 32.566V52.657C58.2916 53.9397 57.6502 54.581 56.3676 54.581C55.0602 54.581 54.4066 53.9397 54.4066 52.657V21.503C54.4066 20.2203 55.0602 19.579 56.3676 19.579C57.6502 19.579 58.2916 20.2203 58.2916 21.503V24.389C59.3769 22.6377 60.6596 21.392 62.1396 20.652C63.6442 19.8873 65.5436 19.505 67.8376 19.505H70.3906C72.9806 19.505 75.0526 19.9613 76.6066 20.874C78.1852 21.762 79.4309 23.2297 80.3436 25.277C81.4289 23.2297 82.7609 21.762 84.3396 20.874C85.9182 19.9613 87.9779 19.505 90.5186 19.505H93.5896Z" />
                        <path d="M120.742 38.56V41.261C120.742 44.739 121.432 47.181 122.814 48.587C124.22 49.9683 126.686 50.659 130.214 50.659H136.282C139.39 50.659 141.647 50.2643 143.053 49.475C144.483 48.661 145.334 47.2673 145.606 45.294C145.704 44.6773 145.902 44.2087 146.198 43.888C146.518 43.5673 146.999 43.407 147.641 43.407C148.282 43.407 148.763 43.592 149.084 43.962C149.429 44.3073 149.565 44.8007 149.491 45.442C149.17 48.55 147.924 50.844 145.754 52.324C143.583 53.804 140.426 54.544 136.282 54.544H130.214C125.601 54.544 122.222 53.4833 120.076 51.362C117.93 49.216 116.857 45.849 116.857 41.261V32.899C116.857 28.237 117.93 24.8453 120.076 22.724C122.222 20.578 125.601 19.5297 130.214 19.579H136.282C140.894 19.579 144.261 20.652 146.383 22.798C148.529 24.9193 149.602 28.2863 149.602 32.899V36.599C149.602 37.9063 148.96 38.56 147.678 38.56H120.742ZM130.214 23.464C126.686 23.4147 124.22 24.093 122.814 25.499C121.432 26.8803 120.742 29.347 120.742 32.899V34.675H145.717V32.899C145.717 29.3717 145.026 26.9173 143.645 25.536C142.263 24.1547 139.809 23.464 136.282 23.464H130.214Z" />
                        <path d="M188.675 54.47C185.641 54.47 183.322 53.8287 181.719 52.546C180.116 51.2387 179.154 49.253 178.833 46.589C178.759 45.9477 178.895 45.4543 179.24 45.109C179.585 44.739 180.091 44.554 180.757 44.554C181.374 44.554 181.83 44.7143 182.126 45.035C182.447 45.3557 182.656 45.8367 182.755 46.478C182.977 48.0073 183.532 49.0803 184.42 49.697C185.333 50.289 186.751 50.585 188.675 50.585H200.811C203.105 50.585 204.684 50.1533 205.547 49.29C206.41 48.4267 206.842 46.848 206.842 44.554C206.842 42.2353 206.41 40.6443 205.547 39.781C204.684 38.9177 203.105 38.486 200.811 38.486H188.823C185.616 38.486 183.224 37.7213 181.645 36.192C180.091 34.638 179.314 32.2577 179.314 29.051C179.314 25.7703 180.091 23.3653 181.645 21.836C183.199 20.282 185.592 19.505 188.823 19.505H200.441C206.016 19.505 209.111 21.9717 209.728 26.905C209.827 27.5463 209.691 28.052 209.321 28.422C208.976 28.7673 208.482 28.94 207.841 28.94C207.224 28.94 206.756 28.7797 206.435 28.459C206.139 28.1383 205.929 27.6697 205.806 27.053C205.633 25.6717 205.128 24.722 204.289 24.204C203.475 23.6613 202.192 23.39 200.441 23.39H188.823C186.677 23.39 185.197 23.7847 184.383 24.574C183.594 25.3633 183.199 26.8557 183.199 29.051C183.199 31.1477 183.606 32.603 184.42 33.417C185.234 34.2063 186.702 34.601 188.823 34.601H200.811C204.215 34.601 206.719 35.415 208.322 37.043C209.925 38.6463 210.727 41.15 210.727 44.554C210.727 47.9333 209.925 50.437 208.322 52.065C206.719 53.6683 204.215 54.47 200.811 54.47H188.675Z" />
                        <path d="M225.238 38.56V41.261C225.238 44.739 225.929 47.181 227.31 48.587C228.716 49.9683 231.183 50.659 234.71 50.659H240.778C243.886 50.659 246.143 50.2643 247.549 49.475C248.98 48.661 249.831 47.2673 250.102 45.294C250.201 44.6773 250.398 44.2087 250.694 43.888C251.015 43.5673 251.496 43.407 252.137 43.407C252.778 43.407 253.259 43.592 253.58 43.962C253.925 44.3073 254.061 44.8007 253.987 45.442C253.666 48.55 252.421 50.844 250.25 52.324C248.079 53.804 244.922 54.544 240.778 54.544H234.71C230.097 54.544 226.718 53.4833 224.572 51.362C222.426 49.216 221.353 45.849 221.353 41.261V32.899C221.353 28.237 222.426 24.8453 224.572 22.724C226.718 20.578 230.097 19.5297 234.71 19.579H240.778C245.391 19.579 248.758 20.652 250.879 22.798C253.025 24.9193 254.098 28.2863 254.098 32.899V36.599C254.098 37.9063 253.457 38.56 252.174 38.56H225.238ZM234.71 23.464C231.183 23.4147 228.716 24.093 227.31 25.499C225.929 26.8803 225.238 29.347 225.238 32.899V34.675H250.213V32.899C250.213 29.3717 249.522 26.9173 248.141 25.536C246.76 24.1547 244.305 23.464 240.778 23.464H234.71Z" />
                        <path d="M279.298 54.544C274.685 54.544 271.306 53.471 269.16 51.325C267.014 49.179 265.941 45.7997 265.941 41.187V32.825C265.941 28.2123 267.001 24.8453 269.123 22.724C271.269 20.578 274.66 19.5297 279.298 19.579H285.366C288.992 19.579 291.754 20.1957 293.654 21.429C295.578 22.6377 296.725 24.5493 297.095 27.164C297.169 27.83 297.021 28.3357 296.651 28.681C296.305 29.0263 295.812 29.199 295.171 29.199C294.579 29.199 294.135 29.051 293.839 28.755C293.543 28.4343 293.321 27.978 293.173 27.386C292.901 25.9553 292.174 24.944 290.99 24.352C289.806 23.76 287.931 23.464 285.366 23.464H279.298C275.77 23.4147 273.304 24.0807 271.898 25.462C270.516 26.8187 269.826 29.273 269.826 32.825V41.187C269.826 44.7143 270.516 47.181 271.898 48.587C273.304 49.9683 275.77 50.659 279.298 50.659H285.366C287.931 50.659 289.806 50.363 290.99 49.771C292.174 49.179 292.901 48.1553 293.173 46.7C293.321 46.108 293.543 45.664 293.839 45.368C294.135 45.0473 294.579 44.887 295.171 44.887C295.812 44.887 296.305 45.072 296.651 45.442C297.021 45.7873 297.169 46.2807 297.095 46.922C296.725 49.5367 295.578 51.4607 293.654 52.694C291.754 53.9273 288.992 54.544 285.366 54.544H279.298Z" />
                        <path d="M311.176 54.544C309.869 54.544 309.215 53.8903 309.215 52.583V21.503C309.215 20.2203 309.869 19.579 311.176 19.579C312.459 19.579 313.1 20.2203 313.1 21.503V27.201C314.383 24.7343 316.233 22.8473 318.65 21.54C321.092 20.2327 323.978 19.579 327.308 19.579C328.615 19.579 329.269 20.2203 329.269 21.503C329.269 22.8103 328.615 23.464 327.308 23.464C322.917 23.464 319.513 24.463 317.096 26.461C314.679 28.4343 313.347 31.2587 313.1 34.934V52.583C313.1 53.8903 312.459 54.544 311.176 54.544Z" />
                        <path d="M338.55 38.56V41.261C338.55 44.739 339.241 47.181 340.622 48.587C342.028 49.9683 344.495 50.659 348.022 50.659H354.09C357.198 50.659 359.455 50.2643 360.861 49.475C362.292 48.661 363.143 47.2673 363.414 45.294C363.513 44.6773 363.71 44.2087 364.006 43.888C364.327 43.5673 364.808 43.407 365.449 43.407C366.091 43.407 366.572 43.592 366.892 43.962C367.238 44.3073 367.373 44.8007 367.299 45.442C366.979 48.55 365.733 50.844 363.562 52.324C361.392 53.804 358.234 54.544 354.09 54.544H348.022C343.41 54.544 340.03 53.4833 337.884 51.362C335.738 49.216 334.665 45.849 334.665 41.261V32.899C334.665 28.237 335.738 24.8453 337.884 22.724C340.03 20.578 343.41 19.5297 348.022 19.579H354.09C358.703 19.579 362.07 20.652 364.191 22.798C366.337 24.9193 367.41 28.2863 367.41 32.899V36.599C367.41 37.9063 366.769 38.56 365.486 38.56H338.55ZM348.022 23.464C344.495 23.4147 342.028 24.093 340.622 25.499C339.241 26.8803 338.55 29.347 338.55 32.899V34.675H363.525V32.899C363.525 29.3717 362.835 26.9173 361.453 25.536C360.072 24.1547 357.618 23.464 354.09 23.464H348.022Z" />
                        <path d="M393.089 54.544C388.55 54.544 385.233 53.4957 383.136 51.399C381.039 49.3023 379.991 45.997 379.991 41.483V23.464H375.588C374.281 23.464 373.627 22.8103 373.627 21.503C373.627 20.2203 374.281 19.579 375.588 19.579H379.991V11.624C379.991 10.3167 380.632 9.663 381.915 9.663C383.222 9.663 383.876 10.3167 383.876 11.624V19.579H393.163C394.446 19.579 395.087 20.2203 395.087 21.503C395.087 22.8103 394.446 23.464 393.163 23.464H383.876V41.483C383.876 44.9363 384.542 47.329 385.874 48.661C387.231 49.993 389.636 50.659 393.089 50.659C393.804 50.659 394.31 50.8193 394.606 51.14C394.927 51.4607 395.087 51.9417 395.087 52.583C395.087 53.8903 394.421 54.544 393.089 54.544Z" />
                    </mask>
                    <rect class="svg-magic-rect" x="0" y="0" width="400" height="60" mask="url(#svg-magic-mask)" fill="#050505" />
                </svg>
                <div class="magic-grd-box"></div>
                <div class="magic-grd-mask magic-grd-mask-1"><span></span></div>
                <div class="magic-grd-mask magic-grd-mask-2"><span></span></div>
                <div class="magic-grd-mask magic-grd-mask-3"><span></span></div>
            </div>
            <div class="hero-content">
                <h1 class="hero__title">тимчасовий секрет</h1>
                <p class="hero__desc">
                    не залишайте сліди в інтернеті
                </p>
            </div>


            <div class="secret-create-wrap">
                @if ($product)
                    
                <form id="form-secret-create" action="{{ route('secret.store') }}">        
                    <div class="secret-create">            
                        <span id="secret-create-symbols" class="secret-create-symbols" data-symbols="{{ $product->symbol }}"></span>            
                        <div id="secret-create-content" class="secret-create-content">                
                            <textarea id="secret-create-text" class="secret-create-text textarea-text" placeholder="твій тимчасовий секрет..." autocomplete="off" spellcheck="false" name="secret"></textarea>
                        </div>

                        <div class="form-secret-row">
                            {{-- ? lifespans --}}
                            @if ($product->lifespans->count() > 1)                               
                                <div class="form-group">
                                    <span class="form-label">Термін зберігання</span>

                                    <div class="custom-select-wrap">
                                        <select id="secret-create-select-ttl"  name="ttl">
                                            @foreach ($product->lifespans as $lifespan)

                                            @if ($lifespan->ttl == 604800)                                            
                                            <option value="{{ $lifespan->ttl }}" selected>{{ $lifespan->desc }}</option>                                                
                                            @else
                                            <option value="{{ $lifespan->ttl }}">{{ $lifespan->desc }}</option>                                                
                                            @endif

                                            @endforeach
                                            
                                        </select>                                      
                                    </div>

                                </div>
                            @endif 
                            
                            {{-- ? passprase --}}
                            @if ($product->passphrase)
                                <div class="form-group">
                                    <span class="form-label">Парольна фраза</span>
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
                                        <input id="secret-create-passphrase" type="password" class="form-input" autocomplete="off" name="passphrase">                           
                                    </div>

                                </div>
                            @endif
                        </div>

                        <button id="secret-create-btn-send" class="secret-create-btn-send btn" type="button">                
                            <span>створити секрет</span>            
                        </button>        
                    </div>    
                </form>
                @else
                    <span class="secret-create-error">
                        Створення секрету тимчасово заблоковано
                    </span>
                @endif
    
                
            </div>
        </div>
    </div>
</section>


<section class="info-section">
    <div class="container">
        <p class="info-section__text">
            Сервіс для безпечного обміну конфіденційною інформацією.
        </p>
    </div>
</section>


<section class="how-work">
    <div class="container">
        <h2 class="how-work__title title-h2">Як це працює</h2>
        <div class="how-work__items">
            <div class="how-work__item">
                <span class="how-work__item-title">Створити секрет</span>
                <div class="how-work__item-content">
                    <p class="how-work__item-text">Введіть конфіденційну інформацію та створіть секрет.</p>
                    <p class="how-work__item-text">Отримаєте унікальне посилання.</p>
                </div>
            </div>
            <div class="how-work__item">
                <span class="how-work__item-title">Поділитися посиланням</span>
                <div class="how-work__item-content">
                    <p class="how-work__item-text">Надішліть отримане посилання через будь-який мессенджер або пошту.</p>
                </div>
            </div>
            <div class="how-work__item">
                <span class="how-work__item-title">Побачити лише один раз</span>
                <div class="how-work__item-content">
                    <p class="how-work__item-text">Після першого перегляду секрету він видаляється із сервісу назавжди.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="security">
    <div class="container">
        <h2 class="security__title title-h2">Безпека</h2>
        <div class="security__items">
            <div class="security__item">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                </svg>
                <div class="security__item-content">
                    <p class="security__item-text">
                        Інформація перед збереженням шифрується.
                    </p>
                </div>
            </div>
            <div class="security__item">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div class="security__item-content">
                    <p class="security__item-text">
                        Інформація зберігається тимчасово.
                    </p>
                    <p class="security__item-text">
                        Після першого перегляду або після закінчення терміну зберігання інформація видаляється назавжди .
                    </p>
                </div>
            </div>
            <div class="security__item">
                <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                <div class="security__item-content">
                    <p class="security__item-text">
                        Отримати доступ до інформації після видалення неможливо.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="storage">
    <div class="container">
        <h2 class="storage__title title-h2">Термін зберігання інформації</h2>
        <ul class="storage__list">
            <li class="storage__li">
                <span class="storage__li-icon">
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H6C4.93913 15 3.92172 15.4214 3.17157 16.1716C2.42143 16.9217 2 17.9391 2 19V21" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17 8L22 13M22 8L17 13" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class="storage__li-text">
                    анонімне використання - 3 дні.
                </span>
            </li>
            <li class="storage__li">
                <span class="storage__li-icon">
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 11L18 13L22 9M16 21V19C16 17.9391 15.5786 16.9217 14.8284 16.1716C14.0783 15.4214 13.0609 15 12 15H6C4.93913 15 3.92172 15.4214 3.17157 16.1716C2.42143 16.9217 2 17.9391 2 19V21" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class="storage__li-text">
                    зареєстрований користувач - від 5 хвилин до 7 днів (обирається під час створення секрету).
                </span>
            </li>
        </ul>
    </div>
</section>


<section class="info-section">
    <div class="container">
        <p class="info-section__text">
            Не забувайте, що безпека ваших даних починається з вас - розумно керуйте своїми даними і ділитесь ними тільки безпечними каналами зв'язку.
        </p>
    </div>
</section>


@endsection