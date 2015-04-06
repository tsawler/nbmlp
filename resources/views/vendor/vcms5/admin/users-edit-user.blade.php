@extends('vcms5::base-two-col')

@section('page-title')
    @if ($user_id > 0)
        Edit User
    @else
        Add User
    @endif
@stop

@section('content-title')
     @if ($user_id > 0)
         Edit User
     @else
         Add User
     @endif
 @stop

 @section('content-title-right')
    Roles
  @stop

@section('content')
{!! Form::model($user, array(
							'role' => 'form',
							'name' => 'bookform', 'id' => 'bookform',
							'url' => array('admin/users/user' )
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

        @if ($self)
            {!! Form::hidden('active', 1) !!}
        @else
            <div class="form-group">
            {!! Form::label('user_active', 'User active?', array('class' => 'control-label')); !!}
                <div class="controls">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-question"></i></span>
                        {!! Form::select('user_active', array(
                                '1' => 'Yes',
                                '0' => 'No'),
                                null,
                                array('class' => 'form-control',
                                    'style' => 'max-width: 400px;')) !!}
                    </div>
                </div>
            </div>
        @endif

		<hr>
	    <div class="form-group">
            <div class="controls">
                {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}
                @if ((Auth::user()->id != $user->id) && ($user_id > 0) && ($self == false))
                <a class="btn btn-danger" href="#!" onclick='confirmDelete({!!$user->id!!})'>Delete this user</a>
                @endif
            </div>
        </div>

    <div>&nbsp;</div>
    {!! Form::hidden('id', $user_id )!!}

{!! Form::close() !!}

@stop

@section('content-right')
@if ($user_id > 0)


{!! Form::model($user->roles, array(
                            'role' => 'form',
                            'name' => 'roleform', 'id' => 'roleform',
                            'url' => array('/admin/users/editroles')
                            )
               )
!!}

    <div class="form-group">
        <div class="controls">
            <div class="input-group">
                @foreach (Tsawler\Vcms5\models\Role::orderBy('role_name')->where('active','=',1)->get() as $role)
                    <?php
                    $hasRole = false;
                    $results = DB::table(Config::get('vcms5.user_roles_table'))->where('user_id', $user->id)->lists('role_id');
                    if (in_array($role->id, $results))
                        $hasRole = true;
                    ?>
                                <div class="form-group">
                                <label class="checkbox" style="margin-left: 10px">
                                    {!! Form::checkbox('r_'.$role->id, $role->id, $hasRole); !!} {!! $role->role_name !!}
                                </label>
                                </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="controls">
            {!! Form::submit('Save', array('class' => 'btn btn-primary submit'));!!}
        </div>
    </div>

    {!! Form::hidden('id', $user->id )!!}

{!! Form::close() !!}
@else
Save user before assigning roles
@endif

@stop

@section('bottom-js')
<script>
function confirmDelete(x){
	bootbox.confirm("Are you sure you want to delete this user?", function(result) {
		if (result==true)
		{
			window.location.href = '/admin/users/deleteuser?id='+x;
		}
	});
}
$(document).ready(function () {
	$("#bookform").validate({
	    rules: {
            password: {
                @if ($user_id == 0)
                required: true,
                @endif
                minlength: 6,
                maxlength: 32
            },
            password_confirm: {
                @if ($user_id == 0)
                required: true,
                @endif
                equalTo: "#password"
            }
        },
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
});
</script>
@stop