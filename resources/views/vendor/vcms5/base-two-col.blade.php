<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>vCMS Administration</title>

    <link href="/vendor/vcms5/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/vcms5/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/vendor/vcms5/admin/css/animate.css" rel="stylesheet">
    <link href="/vendor/vcms5/admin/css/style.css" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/vendor/vcms5/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/vendor/vcms5/admin/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">

    <!-- calendar & datepicker -->
    <link rel="stylesheet" href="/vendor/vcms5/css/datepicker.css">
    <link rel="stylesheet" href="/vendor/vcms5/fullcal/fullcalendar.min.css">
    <link rel="stylesheet" href="/vendor/vcms5/css/pnotify.custom.min.css">
    <link rel="stylesheet" href="/vendor/vcms5/css/admin.css">


</head>

@if (Session::has('mini-navbar'))
    <body class="fixed-nav mini-navbar">
@else
    <body class="fixed-nav">
@endif
    <div id="wrapper">

        @include('vcms5::partials.admin-nav')

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to vCMS Administration</span>
                </li>

                <li>
                    <a href="/admin/logout">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>@yield('page-title')</h2>

            </div>
            <div class="col-lg-2">

            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                        <div class="row">


                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>@yield('content-title')</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="ibox-content">
                                    @yield('content')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>@yield('content-title-right')</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="ibox-content">
                                    @yield('content-right')
                                </div>
                            </div>
                        </div>

                        </div>
                </div>
                <div class="footer fixed">
                    <div class="pull-right">
                        <strong>Copyright</strong> &copy; <?= date('Y') ?> Verilion Inc.
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/vendor/vcms5/admin/js/jquery-2.1.1.js"></script>
    <script src="/vendor/vcms5/admin/js/bootstrap.min.js"></script>
    <script src="/vendor/vcms5/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/vendor/vcms5/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/vendor/vcms5/admin/js/plugins/flot/jquery.flot.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/vendor/vcms5/admin/js/inspinia.js"></script>
    <script src="/vendor/vcms5/admin/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/vendor/vcms5/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Data Tables -->
    <script src="/vendor/vcms5/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/vendor/vcms5/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/vendor/vcms5/admin/js/plugins/dataTables/dataTables.responsive.js"></script>

    <!-- ckeditor -->
    <script src="/vendor/vcms5/ck/ckeditor.js"></script>
    <script src="/vendor/vcms5/ck/adapters/jquery.js"></script>

    <!-- validator -->
    <script src="/vendor/vcms5/js/jquery.validate.min.js"></script>

    <!-- bootbox -->
    <script src="/vendor/vcms5/js/bootbox.min.js"></script>

    <!-- others -->
    <script src="/vendor/vcms5/js/bootstrap-datepicker.min.js"></script>
    <script src="/vendor/vcms5/fullcal/lib/moment.min.js"></script>
    <script src="/vendor/vcms5/fullcal/fullcalendar.min.js"></script>
    <script src="/vendor/vcms5/js/pnotify.custom.min.js"></script>
    <script src="/vendor/vcms5/admin/js/jquery.cookie.js"></script>
    @include('vcms5::partials.messages')

    <script>
        $(document).ready(function () {
            @if (Session::get('lang') == 'fr')
                bootbox.setDefaults({
                    locale: "fr"
                });
            @endif
            @if (Session::get('lang') == 'es')
            bootbox.setDefaults({
                locale: "es"
            });
            @endif
        });
    </script>
    @yield('bottom-js')
</body>
</html>
