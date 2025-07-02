<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <img width="100" height="40" class="footer-logo" src="{{ asset('images/logo.svg') }}" alt="Логотип тимчасовий секрет">
            <ul class="footer-top-menu">
                <li class="footer-top-menu__item">
                    <a class="footer__link link" href="{{ route('about') }}">Про сервіс</a>
                </li>
            </ul>
          
            <a class="feedback__link-btn btn" href="{{ route('feedback') }}">
                <span>зворотний зв'язок</span>
            </a>
        </div>
        <div class="footer-bottom">
            <span class="copiright">© {{ now()->format('Y') }}. Всі права захищені.</span>
            <ul class="footer-bottom-menu">
                <li class="footer-bottom-menu__item">
                    <a class="footer__link link" href="{{ route('privacy') }}">Конфіденційність</a>
                </li>
                <li class="footer-bottom-menu__item">
                    <a class="footer__link link" href="{{ route('terms') }}">Умови</a>
                </li>
            </ul>
        </div>
    </div>
</footer>