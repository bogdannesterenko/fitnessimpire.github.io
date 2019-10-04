@extends ('backend.layouts.app')

@section ('title', 'Редактировать запись')

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
{{ html()->modelForm($comment, 'PATCH', route('admin.comments.update', $comment))->class('form-horizontal')->open() }}
    <div class="card mt-4">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        Редактировать запись
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Запись')->class('col-md-2 form-control-label')->for('post_id') }}

                            <div class="col-md-10">
                                {{ html()->select('post_id',$posts,$comment->post_id)
                                    ->class('form-control')
                                    ->placeholder('Запись')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Автор')->class('col-md-2 form-control-label')->for('author_name') }}

                            <div class="col-md-10">
                                {{ html()->text('author_name')
                                    ->class('form-control')
                                    ->placeholder('Автор')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Одобрено')->class('col-md-2 form-control-label')->for('approved') }}

                            <div class="col-md-10">
                                <label class="switch switch-3d switch-primary">
                                    {{ html()->checkbox('approved', $comment->approved, '1')->class('switch-input') }}
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Текст')->class('col-md-2 form-control-label')->for('body') }}

                            <div class="col-md-10">
                                {{ html()->textarea('body')
                                    ->class('form-control')
                                    ->placeholder('Текст')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.comments.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
