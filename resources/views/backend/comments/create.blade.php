@extends ('backend.layouts.app')

@section ('title', 'Создать комментарий')

@section('content')
    {{ html()->form('POST', route('admin.comments.store'))->class('form-horizontal')->open() }}
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Создать комментарий
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr />

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Запись')->class('col-md-2 form-control-label')->for('post_id') }}

                            <div class="col-md-10">
                                {{ html()->select('post_id',$posts)
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required()}}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Автор')->class('col-md-2 form-control-label')->for('author_name') }}

                            <div class="col-md-10">
                                {{ html()->text('author_name')
                                    ->class('form-control')
                                    ->placeholder('Автор')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Одобрено')->class('col-md-2 form-control-label')->for('approved') }}

                            <div class="col-md-10">
                                <label class="switch switch-3d switch-primary">
                                    {{ html()->checkbox('approved', true, '1')->class('switch-input') }}
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
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.comments.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection