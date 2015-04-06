@extends('vcms5::base')

<?php
$active = ['<span class="text-danger">Inactive</span>', '<span class="text-success">Active</span>'];
?>

@section('top-white')
    <h1>All Users</h1>
@stop

@section('content-title')
Users
@stop

@section('content')
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
            <table id="itable" class="table table-compact table-striped table-hover">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allusers as $user)
                        <tr>
                            <td><a href="/admin/users/user?id={!! $user->id!!}">{!! $user->last_name !!}, {!! $user->first_name !!}</a></td>
                            <td>{!! $user->created_at !!}</td>
                            <td>{!! $user->updated_at !!}</td>
                            <td>{!! $active[$user->user_active] !!}</td>
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