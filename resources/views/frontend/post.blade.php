@extends('frontend.layouts.app')

@section('title', $post->title)

@section('content')
<section class="blog">
    
</section>
<section class="blog-wrapper">
    <div class="container mt-4">  
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="blog-post">
                    <h2>
                        <a href="/blog/{{$post->id}}">
                            {{$post->title}}
                        </a>
                    </h2>
                    <a href="/blog/{{$post->id}}" class="thumb">
                        <img src="{{$post->thumb_url}}">
                    </a>
                    {!!$post->body!!}
                    <div class="meta">
                       <span class="time"><img src="/images/time.png"> {{$post->created_at->diffForHumans()}}</span>
                       <span class="comments"> <img src="/images/comment.png"> {{$post->comments()->count()}}</span>
                    </div>
                </div>
                <div class="comments">
                    <h4>Комментарии</h4>
                    @foreach ($post->comments()->where('approved',1)->get() as $comment)
                        <div class="comment">
                            <span> <strong>{{$comment->author_name}}</strong> говорит:</span>
                            <p>{{$comment->body}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="comment-wrapper">
                    <h4>Оставить комментарий</h4>
                    {{ html()->form('POST', route('frontend.comment.create', $post->id))->class('form-horizontal')->open() }}
                    {{ html()->hidden('post_id',$post->id) }}
                        {{ html()->text('author_name')
                            ->class('form-control')
                            ->placeholder('Ваше имя')
                            ->attribute('maxlength', 191)
                            ->required() }}
                        {{ html()->textarea('body')
                            ->placeholder('Комментарий')
                            ->class('form-control mt-2')
                            ->attribute('maxlength', 191)
                            ->required() }}
                        {{ html()->button('Отправить')
                            ->class('mt-2 btn btn-primary button-comment')
                            ->attribute('type', 'submit')
                             }}
                    {{ html()->form()->close() }}
                </div>
            </div>   
            <div class="col-md-4 col-sm-12 sidebar ">
                <div class="people-about">
                    <img src="/images/sidebar_people.jpg">
                    <h6>О нас</h6>
                    <p>Мы тренируемся, чтобы вдохновлять оспаривать и мотивировать друг друга, чтобы делать больше, максимиризовать каждый день и добиваться результатов.</p>
                    <a href="/about/">Читать подробнее</a>
                </div>
                <div class="news">
                    <h6>Новостная рассылка</h6>
                    <p>Введите последние новости</p>


                    {{ html()->form('POST', route('frontend.assign'))->class('form-horizontal')->open() }}
                        <input class="new-email" type="email" name="email" placeholder="Введите свой email">
                            <button type="submit" class="assign-button">Подписаться</button>
                            <p class="result static"></p>
                    {{ html()->form()->close() }}

                </div>
                <div class="social">
                    <h6>Следите за нами в соц сетях</h6>
                    <p>Следите за нами в соц сетях и получайте призы</p>
                    <ul>
                        <li><a href="https://www.facebook.com/"><img src="/images/face.png"></a></li>
                        <li><a href="https://www.youtube.com/"><img src="/images/you.png"></a></li>
                        <li><a href="https://www.instagram.com/"><img src="/images/insta.png"></a></li>
                        <li><a href="https://www.plus.google.com/"><img src="/images/google.png"></a></li>
                    </ul>
                </div>
            </div>  
        </div>
    </div> 
</section>
@endsection
