@extends('vcms5::public.base-inside')

@section('title')
    @include('vcms5::partials.edit-title')
@stop

@section('content')

    <ul class=" portfolio-filters text-center">

        <li class="filter active" data-filter="all">all</li>

        @foreach($galleries as $gallery)
            <li class="filter" data-filter="g{!! $gallery->id !!}">{!! $gallery->$gallery_name_field !!}</li>
        @endforeach

    </ul>

    <div id="grid" class="row">
        @foreach ($items as $item)
            <div class="mix col-sm-3 g{!! $item->gallery_id !!} margin30">
                <div class="item-img-wrap ">
                    <img src="/galleries/{!! $item->gallery_id !!}/{!! $item->image_name !!}"
                         class="img-responsive" alt="">
                    <div class="item-img-overlay">
                        <a href="/galleries/{!! $item->gallery_id !!}/{!! $item->image_name !!}" class="show-image">
                            <span></span>
                        </a>
                    </div>
                </div>
                <div class="work-desc">
                    <h3><a href="">{!! $item->$item_name_field !!}</a></h3>
                    <span>{!! $item->$item_description_field !!}</span>
                </div>
            </div>
        @endforeach
    </div>

@stop

@section('bottom-js')

@stop