<div class="modal fade" id="galleryModal" tabindex="-1" data-backdrop="false" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Gallery Item</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array(
                                    'url' => '/admin/galleries/save-gallery-item',
                                    'role' => 'form',
                                    'name' => 'gallery-item-form',
                                    'id' => 'gallery-item-form',
                                    'method' => 'post',
                                    'files' => true,
                                    ))
                                !!}
                <!-- Event_title form input -->
                <div class="form-group">
                    {!! Form::label('item_name','Item name:') !!}
                    {!! Form::text('item_name', null, ['id' => 'item_name', 'class' => 'form-control required']) !!}
                </div>

                <!-- Item_description form input -->
                <div class="form-group">
                    {!! Form::label('item_description','Item description:') !!}
                    {!! Form::text('item_description', null, ['id' => 'item_description', 'class' => 'required form-control']) !!}
                </div>

                @if (Config::get('vcms5.use_fr'))
                    <!-- Item_name_fr form input -->
                    <div class="form-group">
                        {!! Form::label('item_name_fr','Item name (French):') !!}
                        {!! Form::text('item_name_fr', null, ['id' => 'item_name_fr', 'class' => 'required form-control']) !!}
                    </div>

                    <!-- Item_description_fr form input -->
                    <div class="form-group">
                        {!! Form::label('item_description_fr','Item description (French):') !!}
                        {!! Form::text('item_description_fr', null, ['id' => 'item_description_fr', 'class' => 'requried form-control']) !!}
                    </div>
                @endif

                @if (Config::get('vcms5.use_es'))
                    <!-- Item_name_fr form input -->
                    <div class="form-group">
                        {!! Form::label('item_name_es','Item name (Spanish):') !!}
                        {!! Form::text('item_name_es', null, ['id' => 'item_name_es', 'class' => 'required form-control']) !!}
                    </div>

                    <!-- Item_description_fr form input -->
                    <div class="form-group">
                        {!! Form::label('item_description_es','Item description (Spanish):') !!}
                        {!! Form::text('item_description_es', null, ['id' => 'item_description_fr', 'class' => 'required form-control']) !!}
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::label('active', 'Image active?', array('class' => 'control-label')); !!}
                    {!! Form::select('active', array(
                            '1' => 'Yes',
                            '0' => 'No'),
                            null,
                            array('class' => 'form-control',
                                'style' => 'max-width: 400px;',
                                'id' => 'item_active')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image_name', 'Browse for file...')!!}
                    {!! Form::file('image_name',['id' => 'image_name']) !!}
                </div>
                {!! Form::hidden('gallery_item_id', null, ['id' => 'gallery_item_id'])!!}
                {!! Form::hidden('gallery_id', $gallery->id, ['id' => 'gallery_id']) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="return false;">Cancel
                </button>
                <button type="button" id="savebutton" class="btn btn-primary" onclick="submitItem(); return false;">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
