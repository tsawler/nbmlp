@extends('vcms5::base')

<?php
$active = ['<span class="text-danger">Inactive</span>', '<span class="text-success">Active</span>'];
?>

@section('top-white')
    <h1>FAQs</h1>
@stop

@section('content-title')

@stop

@section('content')
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Faqs</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content">
                <div class="pull-right">
                    <a class="btn btn-primary" href="/admin/faqs/faq?id=0">New FAQ</a>
                </div>
                <div class="clearfix"></div>
                <table id="itable" class="table table-compact table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Question</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($faqs as $faq)
                        <tr>
                            <td><a href="/admin/faqs/faq?id={!! $faq->id!!}&src=all">{!! $faq->question !!}</a></td>
                            <td>{!! $active[$faq->active] !!}</td>
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