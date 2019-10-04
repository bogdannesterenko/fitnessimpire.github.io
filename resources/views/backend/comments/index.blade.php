@extends ('backend.layouts.app')

@section ('title', 'Комментарии')

@section('content')
<div class="card mt-4">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    Комментарии
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                   <a href="{{ route('admin.comments.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create New"><i class="fa fa-plus-circle"></i></a>
                </div><!--btn-toolbar-->
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Запись</th>
                            <th>Автор</th>
                            <th>Одобрено</th>
                            <th>Текст</th>
                            <th>Создан</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{!! $comment->post_name !!}</td>
                                <td>{{ $comment->author_name }}</td>
                                <td>{{ $comment->approved_result }}</td>
                                <td>{{ $comment->body }}</td>
                                <td>{{ $comment->created_at->diffForHumans() }}</td>
                                <td>{!! $comment->action_buttons !!}</td>
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
                     Всего коментариев - {!! $comments->total() !!}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $comments->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
