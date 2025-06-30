@extends('frontend.layouts.base')


@section('content')



<section class="feedback">
    <div class="container">
        <h1 class="feedback__title title-h1">Зворотний зв'язок</h1>
        <p class="feedback__desc">
            Поділіться своїми думками чи досвідом
            {{-- Поділіться своїми думками, ідеями чи досвідом --}}
        </p>

        <div id="feedback-box" class="feedback-box">

            <div class="preloader">
                <svg class="svg-spin" width="40" height="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <circle class="svg-spin-circle-1" cx="4" cy="12" r="3" />
                    <circle class="svg-spin-circle-2" cx="12" cy="12" r="3" />
                    <circle class="svg-spin-circle-3" cx="20" cy="12" r="3" />
                </svg>                           
            </div>

            <form id="form-feedback" class="form form-feedback" action="{{ route('feedback.post') }}">
                <div id="feedback-content" class="feedback-content">
                    <textarea id="feedback-text" class="feedback-textarea" autocomplete="off" spellcheck="false" name="message"></textarea>
                </div>
                <button id="btn-send-feedback" type="button" class="btn-send-feedback btn">
                    <span>надіслати повідомлення</span>
                </button>
            </form>

            <div class="message-success">            
                <span class="message-success__title">                
                    Повідомлення відправлено!            
                </span>       
            </div>        
            <div class="message-error"></div>
        </div>

       
        
    </div>
</section>



@endsection