@extends('vcms5::public.base-inside')

@section('breadcrumb')
    <li>blogs</li>
@stop

@section('content')

        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="blog-post">
                    <div class="row">
                        <div class="col-md-6">
                            <br>
                            @if (strlen($post->image) > 0)
                                <a href="/vendor/vcms5/blog/{!! $post->blog_id !!}/{!! $post->image !!}" class="show-image">
                                    <div class="item-img-wrap">
                                        <img src="/vendor/vcms5/blog/{!! $post->blog_id !!}/{!! $post->image !!}" class="img-responsive" alt="">
                                        <div class="show-image item-img-overlay">
                                            <span></span>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <div class="item-img-wrap">
                                    <img src="http://placehold.it/400x300" class="img-responsive" alt="">
                                    <div class="show-image item-img-overlay">
                                        <span></span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 margin20">
                            <h2><a href="/blogs/post/{!! $post->slug !!}">{!! $post->$post_title_field !!}</a></h2>
                            <ul class="list-inline post-detail">
                                <li><i class="fa fa-user"></i> <a href="#">{!! $post->user->first_name !!}</a></li>
                                <li><i class="fa fa-calendar"></i> {!! $post->postDate() !!}</li>
                            </ul>
                            <p>
                                {!! $post->$post_content_field !!}
                            </p>
                            <p><a href="/blogs/post/{!! $post->slug !!}" class="btn btn-theme-dark">{!! Lang::get('vcms5::vcms5.read_more') !!}...</a></p>
                        </div>
                    </div>
                </div><!--blog post-->
            @endforeach
        </div>

        <div class="col-md-3 col-md-offset-1">
            <div class="sidebar-box margin40">
                <h4>Search</h4>
                <form role="form" class="search-widget">
                    <input type="text" class="form-control">
                    <i class="fa fa-search"></i>
                </form>
            </div><!--sidebar-box-->
            <div class="sidebar-box margin40">
                <h4>Archives</h4>

            </div><!--sidebar-box-->
        </div><!--sidebar-col-->

@stop

@section('bottom-js')


@stop