@extends ('backend.layouts.app')

@section ('title', 'Создать страницу')

@section('content')
    {{ html()->form('POST', route('admin.pages.store'))->class('form-horizontal')->open() }}
        <div class="card  mt-4">
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
                            {{ html()->label('Название')->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder('Название')
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label('Ярлык')->class('col-md-2 form-control-label')->for('slug') }}

                            <div class="col-md-10">
                                {{ html()->text('slug')
                                    ->class('form-control')
                                    ->placeholder('Ярлык')
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
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.pages.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection