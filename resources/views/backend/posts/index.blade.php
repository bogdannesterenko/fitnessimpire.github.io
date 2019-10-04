@extends ('backend.layouts.app')

@section ('title', 'Записи')

@section('content')
<div class="card mt-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Записи
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                   <a href="{{ route('admin.posts.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create New"><i class="fa fa-plus-circle"></i></a>
                </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Тип</th>
                            <th>Текст</th>
                            <th>Миниатюра</th>
                            <th>Автор</th>
                            <th>Создан</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->type }}</td>
                                <td>{{ $post->body }}</td>
                                <td>{{ $post->thumb_url }}</td>
                                <td>{{ $post->author_name }}</td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                <td>{!! $post->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    Всего записей - {!! $posts->total() !!}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $posts->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
