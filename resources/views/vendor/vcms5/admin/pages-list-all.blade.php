@extends('vcms5::base')

<?php
$active = ['<span class="text-danger">Inactive</span>', '<span class="text-success">Active</span>'];
?>

@section('top-white')
    <h1>All Site Pages</h1>
@stop

@section('content-title')

@stop

@section('content')
<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Site Pages</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>

        <div class="ibox-content">
            <table id="itable" class="table table-compact table-striped table-hover">
                <thead>
                <tr>
                    <th>Page</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($allpages as $page)
                    <tr>
                        <td><a href="/admin/page/page?id={!! $page->id!!}">{!! $page->page_title !!}</a></td>
                        <td>{!! $page->created_at !!}</td>
                        <td>{!! $page->updated_at !!}</td>
                        <td>{!! $active[$page->active] !!}</td>
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