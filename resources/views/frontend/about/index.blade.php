@extends('frontend.layouts.base')


@section('content')



<section class="about">
    <div class="container">
        <h1 class="about__title title-h1">Про сервіс</h1>
        <p class="about__desc">
            Сервіс створений для безпечного обміну конфіденційною інформацією.
        </p>
        <p class="about__desc">
            Надсилаючи конфіденційну інформацію в месенджерах або електронною поштою, копії зберігаються в багатьох місцях.
            Використовуючи цей сервіс, передана інформація зберігається тимчасово та доступна лише для одного перегляду, після чого вона видаляється назавжди.
        </p>
        <p class="about__desc">
            Передана інформація зберігається в зашифрованому виді.
        </p>
        <p class="about__desc">
            Такий підхід допомагає забезпечити безпечний обмін інформацією, обмежуючи її розкриття та запобігаючи несанкціонованому доступу.
        </p>
        <p class="about__desc">
            Ставтеся до цього сервісу як способу обміну повідомленнями, які самознищуються.
        </p>
        <div class="about-content">
            <div class="about-content__item">
                <h4 class="about-content__title title-h4">Як це працює</h4>
                <div class="about-work">
                    <div class="about-work__item">
                        <span class="about-work__item-title">Створити секрет.</span>
                        <div class="about-work__item-content">
                            <p class="about-work__item-text">Введіть конфіденційну інформацію та створіть секрет.</p>
                            <p class="about-work__item-text">Отримаєте унікальне посилання.</p>
                        </div>
                    </div>
                    <div class="about-work__item">
                        <span class="about-work__item-title">Поділитися посиланням.</span>
                        <div class="about-work__item-content">
                            <p class="about-work__item-text">Надішліть отримане посилання через будь-який мессенджер, пошту.</p>
                        </div>
                    </div>
                    <div class="about-work__item">
                        <span class="about-work__item-title">Побачити лише один раз.</span>
                        <div class="about-work__item-content">
                            <p class="about-work__item-text">Після першого перегляду секрету він видаляється із сервісу назавжди.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-content__item">
                <h4 class="about-content__title title-h4">Видалення інформації</h4>
                <p class="about__text">
                    Збережена інформація автоматично видаляється після першого перегляду або після закінчення терміну зберігання.
                </p>
            </div>
            <div class="about-content__item">
                <h4 class="about-content__title title-h4">Термін зберігання</h4>
                <ul class="about-life__items">
                    <li class="about-life__item">
                        анонімне використання - 3 дні.
                    </li>
                    <li class="about-life__item">
                        зареєстрований користувач - від 5 хвилин до 7 днів ( обирається під час створення секрету ).
                    </li>
                </ul>
            </div>
            <div class="about-content__item">
                <h4 class="about-content__title title-h4">Безпека</h4>
                <ul class="about-security__items">
                    <li class="about-security__item">
                        інформація перед збереженням шифрується.
                    </li>
                    <li class="about-security__item">
                        інформація зберігається тимчасово, після чого видаляється назавжди.
                    </li>
                    <li class="about-security__item">
                        отримати доступ до інформації після видалення неможливо.
                    </li>
                </ul>
            </div>
        </div>
        <p class="info-text">
            Не забувайте, що безпека ваших даних починається з вас - розумно керуйте своїми даними і ділитесь ними тільки безпечними каналами зв'язку.
        </p>
    </div>
</section>


@endsection