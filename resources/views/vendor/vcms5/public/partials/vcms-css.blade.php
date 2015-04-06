@if ((Auth::check()) && (Auth::user()->access_level == 3))
    <link rel="stylesheet" href="/vendor/vcms5/js/contextmenu/jquery.contextMenu.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/vendor/vcms5/css/admin.css">
@endif
<link rel="stylesheet" href="/vendor/vcms5/css/vcms.css">
<link rel="stylesheet" href="/vendor/vcms5/css/datepicker.css">
<link rel="stylesheet" href="/vendor/vcms5/fullcal/fullcalendar.min.css">
<link rel="stylesheet" href="/vendor/vcms5/css/pnotify.custom.min.css">
<link rel="stylesheet" href="/vendor/vcms5/css/custom.css">
