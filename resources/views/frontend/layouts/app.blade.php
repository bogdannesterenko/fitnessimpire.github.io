<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        @yield('meta')

        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        {{ style(mix('css/frontend.css')) }}
        {{ style(mix('css/plugins.css')) }}

        @stack('after-styles')
        <link rel="stylesheet" type="text/css" href="/css/custom.css">
        <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div id="app">
            @include('frontend.includes.nav')

            @yield('content')
            <footer>
                <div class="container">
                    <div class="widgets">
                        <div class="col">
                            <h5>Наш адрес:</h5>
                            <p>Livingstone, Season ST. 45/2</p>
                            <p>Los Angeles, inc 4502</p>
                        </div>
                        <div class="col">
                            <h5>Часы работы:</h5>
                            <p>Понедельник - Воскресенье</p>
                            <p>06:00 - 00:00</p>
                            <p>Без выходных</p>
                        </div>
                        <div class="col">
                            <h5>Телефон и email:</h5>
                            <p>8 (800) 695 4215</p>
                            <a href="mailto:fitempire@gmail.com">fitempire@gmail.com</a>
                        </div>
                    </div>
                    <div class="copyright">
                        <p>FITNESS EMPIRE - © All Right Reserved 2018</p>
                        <ul>
                            <li><a href="https://www.facebook.com/"><img src="/images/fb.png"></a></li>
                            <li><a href="https://www.youtube.com/"><img src="/images/yt.png"></a></li>
                            <li><a href="https://www.instagram.com/"><img src="/images/in.png"></a></li>
                            <li><a href="https://www.plus.google.com/"><img src="/images/gp.png"></a></li>
                        </ul>
                    </div>
                </div>
            </footer>
            <div id="return-to-top">
                <div class="angle"></div>
                <span>Наверх</span>
            </div>
            <div class="shadow"></div>
            <div class="modal">
                <div class="inner">
                    <div class="callback">
                        <h4>Запросить обратный звонок</h4>
                        <p>Мы уверены позвонить вам через 30 секунд, просто введите свой номер</p>
                        <div class="form-wrapper">
                            {{ html()->form('POST', route('frontend.callback.form'))->class('form-horizontal mt-4')->open() }}
                                {{ html()->text('name')
                                    ->class('form-control mt-2')
                                    ->placeholder('Ваше имя*')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                                {{ html()->text('phone')
                                    ->placeholder('Телефон*')
                                    ->class('form-control mt-2')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                                {{ html()->button('Отправить')
                                    ->class('mt-4 btn btn-primary callback-button')
                                    ->attribute('type', 'submit')
                                     }}
                                <p class="result static"></p>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                    <div class="photo"></div>
                    <button class="close"></button>
                </div>
            </div>
        </div><!-- #app -->

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/frontend.js')) !!}
        @stack('after-scripts')

        @include('includes.partials.ga')
    </body>
</html>