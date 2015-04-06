@extends('vcms5::base-two-col')

@section('page-title')
    Gallery
@stop

@section('top-white')
    <h1>Gallery</h1>
@stop

@section('content-title')
    Gallery
@stop

@section('content')
{!! Form::model($gallery, array(
                        'role' => 'form',
                        'name' => 'bookform',
                        'id' => 'bookform',
                        'url' => array('admin/galleries/gallery' )
                        )
           )
!!}

    <div class="form-group">
        {!! Form::label('gallery_name', 'Gallery title', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                {!! Form::text('gallery_name', null, array('class' => 'required form-control',
                                                    'style' => 'max-width: 400px;',
                                                    'placeholder' => 'Page title')); !!}
			</div>
		</div>
    </div>

    @if (Config::get('vcms5.use_fr'))
    <div class="form-group">
    {!! Form::label('gallery_name_fr', 'Gallery title (French)', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                {!! Form::text('gallery_name_fr', null, array('class' => 'required form-control',
                                                    'style' => 'max-width: 400px;',
                                                    'placeholder' => 'Page title')); !!}
            </div>
        </div>
    </div>
    @endif

@if (Config::get('vcms5.use_es'))
    <div class="form-group">
        {!! Form::label('gallery_name_es', 'Gallery title (Spanish)', array('class' => 'control-label')); !!}
        <div class="controls">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-font"></i></span>
                {!! Form::text('gallery_name_es', null, array('class' => 'required form-control',
                'style' => 'max-width: 400px;',
                'placeholder' => 'Page title')); !!}
            </div>
        </div>
    </div>
@endif

    <div class="form-group">
    {!! Form::label('active', 'Gallery active?', array('class' => 'control-label')); !!}
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
        @if ($gallery_id > 0)
            <a class="btn btn-danger" href="#!" onclick='confirmDelete({!! $gallery->id !!})'>Delete this gallery</a>
        @endif
    </div>
</div>
<div>&nbsp;</div>
        {!! Form::hidden('gallery_id', $gallery_id )!!}

	{!! Form::close() !!}

@stop

@section('content-title-right')
    Gallery Items
@stop

@section('content-right')
    @if ($gallery_id > 0)
    <div class="pull-right">
        <button class="btn btn-info" onclick="addGalleryItem(); return false;">Add Item</button>
    </div>
    <div class="clearfix"></div>
    <ul class="list-unstyled">
        @foreach ($items as $item)
            <li>
                <div class="row">
                <div class="col-md-4 text-center">
                    @if ($item->active == 0)
                        <h3><em>{!! $item->item_name !!} (inactive)</em></h3>
                    @else
                        <h3>{!! $item->item_name !!}</h3>
                    @endif
                    <button class="btn btn-info btn-block" onclick="editItem({!! $item->id !!})"><i class="fa fa-pencil"></i> Edit</button>

                    <button class="btn btn-danger btn-block" onclick="deleteItem({!! $item->id !!})"><i class="fa fa-trash"></i> Delete</button>
                </div>
                <div class="col-md-8">
                <img
                    class="center-block gallery-thumb img-thumbnail"
                    src='/galleries/{!! $gallery->id !!}/thumbs/{!! $item->image_name !!}'>
                </div>
                </div>
            </li>
        @endforeach
    </ul>
    @endif
@stop

@section('bottom-js')
@include('vcms5::partials.modals.gallery-item-modal')
<script>
function confirmDelete(x){
	bootbox.confirm("Are you sure you want to delete this gallery and all of its images?", function(result) {
		if (result==true)
		{
			window.location.href = '/admin/galleries/deletegallery?id='+x;
		}
	});
}

function deleteItem(x){
	bootbox.confirm("Are you sure you want to delete this item?", function(result) {
		if (result==true)
		{
			window.location.href = '/admin/galleries/deleteitem?id='+x+'&gallery_id='+{!! $gallery->id !!};
		}
	});
}

$(document).ready(function () {
	$("#gallery-item-form").validate({
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
    var okay = 	$("#gallery-item-form").validate({
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
        $("#gallery-item-form").submit();
    }
}

function addGalleryItem(){
    $("#item_name_fr").val('');
    $("#item_description_fr").val('');
    $("#item_name").val('');
    $("#item_description").val('');
    $("#gallery_item_id").val('0');
    $("#galleryModal").modal().show();
    $('#image_name').val('');
    $('#active').val(1);
}

function editItem(i) {
    var gallery_item_id = i;
    $.get('/admin/galleries/retrieve_item?id=' + gallery_item_id, function(data, textStatus) {
        var theItem = JSON.parse(data);
        var curItem = theItem[0];
        @if (Config::get('vcms5.use_fr'))
            $("#item_name_fr").val(curItem.item_name_fr);
            $("#item_description_fr").val(curItem.item_description_fr);
        @endif
        $("#item_name").val(curItem.item_name);
        $("#item_description").val(curItem.item_description);
        $("#gallery_id").val(curItem.gallery_id);
        $("#gallery_item_id").val(curItem.id);
        $("#item_active").val(curItem.active_yn);
    }, 'text');
    //$("#delbtn").removeClass("hidden");
    $("#galleryModal").modal().show();
    $('#image_name').val('');
}
</script>
@stop