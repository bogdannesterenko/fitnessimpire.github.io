@extends ('backend.layouts.app')

@section ('title', 'Создать страницу')

@section('content')
    {{ html()->form('POST', route('admin.posts.store'))->class('form-horizontal')->attribute('enctype','multipart/form-data')->open() }}
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            Создать страницу
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr />

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Заголовок')->class('col-md-2 form-control-label')->for('title') }}

                            <div class="col-md-10">
                                {{ html()->text('title')
                                    ->class('form-control')
                                    ->placeholder('Заголовок')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Тип')->class('col-md-2 form-control-label')->for('type') }}

                            <div class="col-md-10">
                                {{ html()->select('type',['blog'=>'Запись блога','train'=>'Тренировочная программа'])
                                    ->class('form-control')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Текст')->class('col-md-2 form-control-label')->for('body') }}

                            <div class="col-md-10">
                                {{ html()->textarea('body')
                                    ->class('form-control')
                                    ->placeholder('Текст')
                                    ->attribute('maxlength', 191)
                                    ->attribute('id', 'summernote')
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Миниатюра')->class('col-md-2 form-control-label')->for('file') }}

                            <div class="col-md-10">
                                {{ html()->file('file')
                                    ->class('form-control form-control-file')
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.posts.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection