@extends('vcms5::base')

<?php
$active = array('Inactive', 'Active');
?>

@section('top-white')
    <h1>Blog</h1>
@stop

@section('content')
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>
            Blog {!! $blog->title!!}
            </h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">
            {!! Form::model($blog, array(
                                    'role' => 'form',
                                    'name' => 'bookform', 'id' => 'bookform',
                                    'url' => array('admin/blogs/blog' )
                                    )
                       )
            !!}

            <div class="form-group">
                {!! Form::label('title', 'Blog title', array('class' => 'control-label')); !!}
                <div class="controls">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                        {!! Form::text('title', null, array('class' => 'required form-control',
                                                            'style' => 'max-width: 400px;',
                                                            'placeholder' => 'Blog title')); !!}
                    </div>
                </div>
            </div>

            @if (Config::get('vcms5.use_fr'))
            <div class="form-group">
            {!! Form::label('title_fr', 'Blog title (French)', array('class' => 'control-label')); !!}
                <div class="controls">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-font"></i></span>
                        {!! Form::text('title_fr', null, array('class' => 'required form-control',
                                                            'style' => 'max-width: 400px;',
                                                            'placeholder' => 'French title')); !!}
                    </div>
                </div>
            </div>
            @endif

            @if (Config::get('vcms5.use_es'))
                <div class="form-group">
                    {!! Form::label('title_es', 'Blog title (Spanish)', array('class' => 'control-label')); !!}
                    <div class="controls">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-font"></i></span>
                            {!! Form::text('title_es', null, array('class' => 'required form-control',
                            'style' => 'max-width: 400px;',
                            'placeholder' => 'Spanish title')); !!}
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
            {!! Form::label('active', 'Blog active?', array('class' => 'control-label')); !!}
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


            <hr>
            <div class="form-group">
            <div class="controls">
                {!! Form::submit('Save', array('class' => 'btn btn-primary submit')) !!}
                @if($blog_id > 0)
                <a class="btn btn-danger" href="#!" onclick='confirmDelete({!!$blog->id!!})'>Delete this blog</a>
                @endif
            </div>
        </div>
        <div>&nbsp;</div>
        {!! Form::hidden('blog_id', $blog->id )!!}

        {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@if($blog_id > 0)
    @section('bottom-panel')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Posts</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="pull-right">
                    <a class="btn btn-primary" href="/admin/blogs/post?id=0&id=0&bid={!! $blog->id !!}">New Post</a>
                </div>
                <div class="clearfix"></div>
                <table id="itable" class="table table-compact table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Post</th>
                            <th>Author</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>
                                    <a href="/admin/blogs/post?id={!! $item->id !!}&bid={!! $blog->id !!}">
                                        {!! $item->title!!}</td>
                                    </a>
                                <td>
                                    @if ($item->user_id != null)
                                        {!! app\User::find($item->user_id)->first_name !!}
                                        {!! app\User::find($item->user_id)->last_name !!}
                                    @else
                                        User deleted
                                    @endif
                                </td>
                                <td>{!! $item->created_at !!}</td>
                                <td>{!! $item->updated_at !!}</td>
                                <td>
                                    @if ($item->active == 1)
                                        <span class="text-success">{!! $active[$item->active] !!}</span>
                                    @else
                                        <span class="text-danger">{!! $active[$item->active] !!}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @stop
@endif

@section('bottom-js')

<script>
function confirmDelete(x){
	bootbox.confirm("Are you sure you want to delete this blog and all of its posts?", function(result) {
		if (result==true)
		{
			window.location.href = '/admin/blogs/deleteblog?id='+x;
		}
	});
}

$(document).ready(function () {
	$("#bookform").validate({
		errorClass:'text-danger',
		validClass:'text-success',
    	errorElement:'span',
    	highlight: function (element, errorClass, validClass) {
        $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
	    },
	    unhighlight: function (element, errorClass, validClass) {
	        $(element).parents(".text-danger").removeClass(errorClass).addClass(validClass);
	    }
	});
});

function submitItem(){
    var okay = 	$("#bookform").validate({
        errorClass:'text-danger',
        validClass:'text-success',
        errorElement:'span',
        highlight: function (element, errorClass, validClass) {
           $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".text-danger").removeClass(errorClass).addClass(validClass);
        }
    }).form();
    if (okay){
        $("#bookform").submit();
    }
}
</script>
@stop
