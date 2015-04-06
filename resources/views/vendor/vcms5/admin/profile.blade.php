@extends('vcms5::base-two-col')

@section('page-title')
    <h1>User Profile: {!! Auth::user()->first_name !!}</h1>
@stop

@section('content-title')
    User Information
@stop

@section('content-title-right')
    Custom Information
@stop

@section('content')
    {!! Form::model($user, array(
                                'role' => 'form',
                                'name' => 'bookform', 'id' => 'bookform',
                                'url' => array('admin/users/profile' )
                                )
                   )
    !!}

    <div class="form-group">
        {!! Form::label('first_name', 'First name', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                {!! Form::text('first_name', null, array('class' => 'required form-control',
                                                    'style' => 'max-width: 400px;',
                                                    'placeholder' => 'First name')); !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('last_name', 'Last name', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                {!! Form::text('last_name', null, array('class' => 'required form-control',
                                                    'style' => 'max-width: 400px;',
                                                    'placeholder' => 'Last name')); !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {!! Form::email('email', null, array('class' => 'form-control required email',
                                                    'style' => 'max-width: 400px;')); !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                {!! Form::password('password', array('class' => 'form-control',
                                                    'style' => 'max-width: 400px;')); !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password_confirm', 'Confirm Password', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                {!! Form::password('password_confirm', array('class' => 'form-control',
                                                    'style' => 'max-width: 400px;')); !!}
            </div>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="controls">
            {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}
        </div>
    </div>

    <div>&nbsp;</div>

    {!! Form::close() !!}

@stop

@section('content-right')

    {!! Form::model($prefs, array(
                                'role' => 'form',
                                'name' => 'prefform',
                                'id' => 'prefform',
                                'url' => 'admin/users/prefs',
                                'files' => true,
                                )
                   )
    !!}

    <div class="form-group">
        {!! Form::label('image_name', 'Profile Image', ['class' => 'control-label']) !!}
        <br>
        @if ((Auth::user()->prefs) && (Auth::user()->prefs->avatar != null))
            <img alt="image" class="img-circle"
                 src="/vendor/vcms5/assets/avatars/{!! Auth::user()->prefs->avatar !!}" />
        @else
            <img alt="image" class="img-circle" src="/vendor/vcms5/assets/img/avatar.png" />
        @endif
        <br><br>
        <div class="controls">
            {!! Form::file('image_name',['id' => 'image_name']) !!}
        </div>
    </div>

    <!-- Username form input -->
    <div class="form-group">
        {!! Form::label('username','Username:') !!}
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            {!! Form::text('username', null, ['class' => 'form-control', 'style' => 'max-width: 400px']) !!}
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="controls">
            {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}
        </div>
    </div>


    {!! Form::close() !!}

@stop

@section('bottom-js')
    <script>
        function confirmDelete(x) {
            bootbox.confirm("Are you sure you want to delete this user?", function (result) {
                if (result == true) {
                    window.location.href = '/admin/users/deleteuser?id=' + x;
                }
            });
        }
        $(document).ready(function () {
            $("#bookform").validate({
                rules: {
                    password: {
                        minlength: 6,
                        maxlength: 32
                    },
                    password_confirm: {
                        equalTo: "#password"
                    }
                },
                errorClass: 'has-error',
                validClass: 'has-success',
                errorElement: 'span',
                highlight: function (element, errorClass, validClass) {
                    $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
                }
            });
        });
    </script>
@stop