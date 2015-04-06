@extends('vcms5::public.base-inside')

@section('breadcrumb')
    <li>blogs</li>
    <li><a href="/blogs/{!! $post->blog->slug !!}">{!! $post->blog->$blog_title_field !!}</a></li>
@stop


@section('content')

    <div class="col-md-8">
        <div class="blog-post">
            @if (strlen($post->image) > 0)
                <div>
                    <a href="/vendor/vcms5/blog/{!! $post->blog_id !!}/{!! $post->image !!}" class="show-image">
                        <div class="item-img-wrap">
                            <img src="/vendor/vcms5/blog/{!! $post->blog_id !!}/{!! $post->image !!}" class="img-responsive" alt="">
                            <div class="show-image item-img-overlay">
                                <span></span>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
            <h2>{!! $post->$post_title_field !!}</h2>
            <ul class="list-inline post-detail">
                <li><i class="fa fa-user"></i> <a href="#">{!! $post->user->first_name !!}</a></li>
                <li><i class="fa fa-calendar"></i> {!! $post->postDate() !!}</li>
            </ul>
            {!! $post->$post_content_field !!}
        </div><!--blog post-->
    </div>

@stop
