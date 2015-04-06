@extends('vcms5::base')

@section('top-white')
    <h1>FAQ</h1>
@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>
                    @if ($faq_id > 0)
                        Edit FAQ
                    @else
                        Add FAQ
                    @endif
                </h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">

                {!! Form::model($faq,array(
                    'url' => '/admin/faqs/faq',
                    'role' => 'form',
                    'name' => 'bookform',
                    'id' => 'bookform',
                    'method' => 'post',
                    ))
                !!}

                <div role="tabpanel">
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
                                {!! Form::label('question', 'Question', array('class' => 'control-label')); !!}
                                <div class="controls">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                        {!! Form::text('question', null, array('class' => 'required form-control',
                                                                            'style' => 'max-width: 400px;',
                                                                            'placeholder' => 'Question')); !!}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('answer', 'Answer', array('class' => 'control-label')); !!}
                                <div class="controls">
                                    {!! Form::textarea('answer', null); !!}
                                </div>
                            </div>

                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="french">
                            <br>
                            @if (Config::get('vcms5.use_fr'))
                                <div class="form-group">
                                    {!! Form::label('quesiton_fr', 'Question (French)', array('class' => 'control-label')); !!}
                                    <div class="controls">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                            {!! Form::text('question_fr', null, array('class' => 'required form-control',
                                                                                'style' => 'max-width: 400px;',
                                                                                'placeholder' => 'Question')); !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('answer_fr', 'Answer (French)', array('class' => 'control-label')); !!}
                                    <div class="controls">
                                        {!! Form::textarea('answer_fr', null); !!}
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('active', 'FAQ active?', array('class' => 'control-label')); !!}
                        <div class="controls">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-question"></i></span>
                                {!! Form::select('active', array(
                                        '1' => 'Yes',
                                        '0' => 'No'),
                                        null,
                                        array('class' => 'form-control',
                                            'style' => 'max-width: 400px;')) !!}
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="controls">
                            {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}
                            @if ($faq_id > 0)
                                <a class="btn btn-danger" href="#!" onclick='confirmDelete({!!$faq->id!!})'>Delete this FAQ</a>
                            @endif
                            <a class="btn btn-info" href="/admin/faqs/all-faqs">Cancel</a>
                        </div>
                    </div>

                    <div>&nbsp;</div>

                    {!! Form::hidden('faq_id', $faq_id )!!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
@stop

@section('bottom-js')
<script>
    @if ($faq_id > 0)
    function confirmDelete(x){
        bootbox.confirm("Are you sure you want to delete this FAQ?", function(result) {
            if (result==true)
            {
                window.location.href = '/admin/faqs/deletefaq?id=' + x;
            }
        });
    }
    @endif
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

        CKEDITOR.replace( 'answer',
                {
                    toolbar : 'MyToolbar',
                    forcePasteAsPlainText: true,
                    enterMode : '1'
                });

        @if (Config::get('vcms5.use_fr'))
        CKEDITOR.replace( 'answer_fr',
                {
                    toolbar : 'MyToolbar',
                    forcePasteAsPlainText: true,
                    enterMode : '1'
                });
        @endif
    });
</script>
@stop