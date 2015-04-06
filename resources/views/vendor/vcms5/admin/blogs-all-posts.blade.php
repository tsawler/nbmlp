@extends('vcms5::base')

<?php
$active = ['<span class="text-danger">Inactive</span>', '<span class="text-success">Active</span>'];
?>

@section('top-white')
    <h1>Blog Posts</h1>
@stop

@section('content-title')

@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Blog Posts</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="pull-right">
                    <a class="btn btn-primary" href="/admin/blogs/post?id=0&id=0&bid=0&src=all">New Post</a>
                </div>
                <div class="clearfix"></div>
                <table id="itable" class="table table-compact table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Post</th>
                        <th>Post Date</th>
                        <th>Author</th>
                        <th>Blog</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="/admin/blogs/post?id={!! $post->id!!}&bid={!! $post->blog_id !!}&src=all">{!! $post->title !!}</a></td>
                            <td>{!! date("l, F jS, Y", strtotime($post->post_date)) !!}</td>
                            <td>{!! app\User::find($post->user_id)->first_name !!} {!! app\User::find($post->user_id)->last_name !!}</td>
                            <td>{!! $post->blog->title !!}</td>
                            <td>{!! date("M jS, Y g:i a", strtotime($post->created_at)) !!}</td>
                            <td>{!! date("M jS, Y g:i a", strtotime($post->updated_at)) !!}</td>
                            <td>{!! $active[$post->active] !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('bottom-js')
    <script>
        $(document).ready(function() {
            $('#itable').dataTable({
                responsive: true,
                stateSave: true
            });
        });
    </script>
@stop