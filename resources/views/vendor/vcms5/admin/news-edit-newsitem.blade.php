@extends('vcms5::base')

@section('top-white')
    <h1>News Item</h1>
@stop


@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    @if ($news_id > 0)
                        Edit News Item
                    @else
                        Add News Item
                    @endif
                </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                {!! Form::model($news, array(
                                        'role' => 'form',
                                        'name' => 'bookform', 'id' => 'bookform',
                                        'url' => 'admin/news/newsitem',
                                        'files' => true
                                        )
                           )
                !!}

                <div role="tabpanel">
                    <br>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#english" aria-controls="english" role="tab" data-toggle="tab">English</a>
                        </li>
                        <li role="presentation">
                            <a href="#french" aria-controls="french" role="tab" data-toggle="tab">French</a>
                        </li>
                    </ul>

                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade in active" id="english">
                            <br>
                            <div class="form-group">
                                {!! Form::label('title', 'Title', array('class' => 'control-label')); !!}
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {!! Form::text('title', null, array('class' => 'required form-control',
                                                                            'style' => 'max-width: 400px;',
                                                                            'placeholder' => 'Title')); !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('news_text', 'Content', array('class' => 'control-label')); !!}
                                <div class="controls">
                                    {!! Form::textarea('news_text', null); !!}
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="french">
                            <br>
                            @if (Config::get('vcms5.use_fr'))
                                <div class="form-group">
                                    {!! Form::label('title_fr', 'Title (French)', array('class' => 'control-label')); !!}
                                    <div class="controls">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                            {!! Form::text('title_fr', null, array('class' => 'required form-control',
                                                                                'style' => 'max-width: 400px;',
                                                                                'placeholder' => 'Title')); !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('news_text_fr', 'Content (French)', array('class' => 'control-label')); !!}
                                    <div class="controls">
                                        {!! Form::textarea('news_text_fr', null ); !!}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('news_date', 'Item Date', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {!! Form::text('news_date', null, array('class' => 'required form-control datepicker',
                                                                    'style' => 'max-width: 400px;',
                                                                    'placeholder' => 'YYYY-MM-DD')); !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('active', 'Item active?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('active', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        1,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    @if($news_id > 0)
                        @if (($news->image != null) && (strlen($news->image) > 0))
                            <img class="img img-responsive img-thumbnail" src="/vendor/vcms5/news/thumbs/{!! $news->image!!}">
                        @else
                            <img class="img img-responsive img-thumbnail" src="http://placehold.it/200x200&text=No+Image">
                        @endif
                    @else
                        <img class="img img-responsive img-thumbnail" src="http://placehold.it/200x200&text=No+Image">
                    @endif

                    <div class="form-group">
                        {!! Form::label('image', 'Item Image')!!}
                        {!! Form::file('image_name',['id' => 'image_name']) !!}
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="controls">
                            {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}
                            @if ($news_id > 0)
                            <a class="btn btn-danger" href="#!" onclick='confirmDelete({!!$news->id!!})'>Delete this item</a>
                            @endif
                        </div>
                    </div>
                    <div>&nbsp;</div>
                    {!! Form::hidden('news_id', $news->id )!!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@stop

@section('bottom-js')
    <script>
        function confirmDelete(x){
            bootbox.confirm("Are you sure you want to delete this item?", function(result) {
                if (result==true)
                {
                    window.location.href = '/admin/news/deletenews?id='+x;
                }
            });
        }
        $(document).ready(function () {
            $("#bookform").validate({
                errorClass:'has-error',
                validClass:'has-success',
                errorElement:'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
                }
            });

            $(".datepicker").datepicker({format: 'yyyy-mm-dd', autoclose: true});

            CKEDITOR.replace( 'news_text',
                    {
                        toolbar : 'MyToolbar',
                        forcePasteAsPlainText: true,
                        enterMode : '1'
                    });

            @if (Config::get('vcms5.use_fr'))
            CKEDITOR.replace( 'news_text_fr',
                    {
                        toolbar : 'MyToolbar',
                        forcePasteAsPlainText: true,
                        enterMode : '1'
                    });
            @endif
        });
    </script>
@stop