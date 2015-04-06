@extends('vcms.base')

@section('browser-title')
Gallery
@stop

@section('title')
<h1>Gallery</h1>
@stop

@section('css')
<link rel="stylesheet" href="/vendor/vcms5/plugins/cubeportfolio/css/cubeportfolio.min.css">
<style>
.image-style-one {
    width: 200px;
}
</style>
@stop

@section('content')

<!-- Portfolio Start -->
<div class="portfolio pf-one">
    <!-- Portfolio Block Content -->
    <div class="portfolio-content">
        <div id="filters">
            <a href="#" data-filter="*" class="btn btn-color">All</a>
            @foreach((Tsawler\Vcms5\models\Gallery::where('active','=','1')
            	->orderBy('gallery_name')
            	->get()) as $gallery)
            	@if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
            		<a href="#" data-filter=".g{!! $gallery->id !!}" class="btn btn-color">{!! $gallery->gallery_name!!}</a>
            	@else
            		<a href="#" data-filter=".g{!! $gallery->id !!}" class="btn btn-color">{!! $gallery->gallery_name!!}</a>
            	@endif
            @endforeach
        </div>
        <?php
        $items = Tsawler\Vcms5\models\GalleryItem::whereRaw('gallery_id in (select id from galleries where active = 1)')
            ->where('active', '=', 1)
            ->orderBy('item_name')
            ->get();
        ?>
        <div id="portfolio">
            @foreach($items as $item)
                @if ((Session::has('lang')) && (Session::get('lang') == 'fr'))
                    <!-- Portfolio Image and Text Container -->
                    <div class="p-element g{!! $item->gallery_id !!}">
                        <div class="element">
                            <div class="image-style-one">
                                <!-- Image -->
                                <img class="img-responsive"
                                    src="/galleries/{!! $item->gallery_id !!}/thumbs/{!! $item->image_name !!}" alt="" />
                                <!-- image hover style for image #1 -->
                                <div class="image-hover">
                                    <!-- Image Caption -->
                                    <div class="image-caption">
                                        <!-- Heading -->
                                        <h4>{!! $item->item_name_fr !!}</h4>
                                        <!-- Paragraph -->
                                        <p>{!! $item->item_description_fr !!}</p>
                                        <a href="/galleries/{!! $item->gallery_id !!}/{!! $item->image_name !!}"
                                            class="lightbox">
                                            <i class="fa fa-search"></i>
                                        </a> &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="p-element g{!! $item->gallery_id !!}">
                        <div class="element">
                            <div class="image-style-one">
                                <!-- Image -->
                                <img class="img-responsive"
                                    src="/galleries/{!! $item->gallery_id !!}/thumbs/{!! $item->image_name !!}" alt="" />
                                <!-- image hover style for image #1 -->
                                <div class="image-hover">
                                    <!-- Image Caption -->
                                    <div class="image-caption">
                                        <!-- Heading -->
                                        <h4>{!! $item->item_name !!}</h4>
                                        <!-- Paragraph -->
                                        <p>{!! $item->item_description !!}</p>
                                        <a href="/galleries/{!! $item->gallery_id !!}/{!! $item->image_name !!}"
                                            class="lightbox">
                                            <i class="fa fa-search"></i>
                                        </a> &nbsp;
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- Portfolio End -->

@stop
@section('bottom-js')
<script src="/vendor/vcms5/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>

<!-- Imageloaded -->
<script src="/vendor/vcms5/assets/js/imagesloaded.min.js"></script>
<!-- Isotope -->
<script src="/vendor/vcms5/assets/js/isotope.js"></script>

<script type="text/javascript">
    var $container = $('#portfolio');

    // Initialize isotope
    $container.imagesLoaded( function(){
      $container.fadeIn(1000).isotope({
         layoutMode : 'fitRows',
         itemSelector : '.p-element'
      });
    });

    // Filter items when filter link is clicked

    $('#filters a').click(function(){
        var selector = $(this).attr('data-filter');
        $container.isotope({ filter: selector });
        return false;
    });
</script>
@stop
