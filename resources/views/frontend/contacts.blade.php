@extends('frontend.layouts.app')

@section('title', 'Контакты')

@section('content')
<section class="contacts-head">
</section>
<section class="contacts-info-wrapper">
    <div class="container">
        <div class="info">
            <h3>Контактная информация</h3>
            <h2>Наше место нахождения</h2>
            <div class="info-blocks">
                <div class="block">
                    <div class="clock"><img src="/images/icon1.png"></div>
                    <div class="place"></div>
                    <div class="block-desc">
                        <span>Найдите нас здесь</span>
                        <span>Livingstone, Seasons St. 42/2</span>
                        <span>Los Angeles, inc - 4502</span>
                    </div>
                </div>
                <div class="block">
                    <div class="clock"><img src="/images/icon2.png"></div>
                    <div class="block-desc">
                        <span>Часы работы</span>
                        <span>Понедельник - Воскресенье</span>
                        <span>06:00 - 00:00 Без выходных</span>
                    </div>
                </div>
                <div class="block">
                    <div class="clock"><img src="/images/icon3.png"></div>
                    <div class="block-desc">
                        <span>Телефон и email</span>
                        <span>8 (800) 695 4215</span>
                        <span><a href="mailto:fitempire@gmail.com">fitempire@gmail.com</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="callback">
            <h4>Свяжитесь с нами</h4>
            <p>Мы уверены, что это решение повлияет на вашу жизнь в позитивном ключе</p>
            <div class="form-wrapper">
                {{ html()->form('POST', route('frontend.contact.form'))->class('form-horizontal mt-4')->open() }}
                    {{ html()->text('name')
                        ->class('form-control mt-2')
                        ->placeholder('Ваше имя*')
                        ->attribute('maxlength', 191)
                        ->required() }}
                    {{ html()->email('email')
                        ->placeholder('Email*')
                        ->class('form-control mt-2')
                        ->attribute('maxlength', 191)
                        ->required() }}
                    {{ html()->text('body')
                        ->placeholder('Комментарий*')
                        ->class('form-control mt-2')
                        ->attribute('maxlength', 191)
                        ->required() }}
                    {{ html()->button('Отправить')
                        ->class('mt-4 btn btn-primary contact-button')
                        ->attribute('type', 'submit')
                         }}
                    <p class="result static"></p>
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
</section>
<section class="map-wrapper">
    <div id="map"></div>
</section>

<script>
      function initMap() {
        var uluru = {lat: 34.023574, lng: -118.3408034};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11.75,
          center: uluru
        });
      }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMW2zrW_q3lFOm5MMo0sF4HiK2Uq3BfkU&callback=initMap">
    </script>

@endsection
