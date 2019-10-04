@extends('frontend.layouts.app')

@section('title', 'Главная')

@section('content')
    <section class="slider-wrapper">
        <div class="slider owl-theme owl-carousel">
            <div class="slide">
                <div class="container">
                    {!! $slider_text !!}
                </div>
            </div>
            <div class="slide">
                <div class="container">
                    {!! $slider_text !!}
                </div>
            </div>
            <div class="slide">
                <div class="container">
                    {!! $slider_text !!}
                </div>
            </div>
        </div>
    </section>
    <section class="about-wrapper">
        <div class="container">
            <div class="people">
                
            </div>
            <div class="text">
                {!! $about_text !!}
            </div>
        </div>
    </section>
    <section class="traning-wrapper">
        <div class="container">
            {!! $train_text !!}
            <div class="training">
                @foreach ($posts as $post)
                <div class="post">
                    <div class="thumbnail" style="background-image:url('{{$post->thumb_url}}')">
                    </div>

                    <div class="post-content">
                        <h4 class="post-title">
                            {!! $post->title !!}
                        </h4>
                        {!! $post->body !!}
                        <a href="/blog/{{$post->id}}">Подробнее</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="assign">
        <div class="container">
            <h2>Получить специальные предложения нашего клуба</h2>
            <h3> и последние советы </h3>
            <div class="form-wrapper">
                {{ html()->form('POST', route('frontend.assign'))->class('form-horizontal')->open() }}
                    {{ html()->email('email')
                        ->class('email')
                        ->placeholder(__('Введите свой email'))
                        ->attribute('maxlength', 191)
                         }}
                    {{ html()->button(__('Подписаться'))->attribute('type', 'submit')->class('btn btn-primary assign-button') }}
                    <p class="result static"></p>

                {{ html()->form()->close() }}

            </div>
        </div>
    </section>

@endsection