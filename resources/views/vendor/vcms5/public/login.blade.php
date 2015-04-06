<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="ResponsiveWebInc">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="/vendor/vcms5/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link href="/vendor/vcms5/assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS for this page -->

    <!-- Base style -->
    <link href="/vendor/vcms5/assets/css/styles/style.css" rel="stylesheet">
    <!-- Skin CSS -->
    <link href="/vendor/vcms5/assets/css/styles/skin-orange.css" rel="stylesheet" id="color_theme">

    <!-- Custom CSS. Type your CSS code in custom.css file -->
    <link href="/vendor/vcms5/assets/css/custom.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="#">
</head>

<body class="bg-img no-box">

<!-- Login Starts  -->

<div class="login-reg">
    <!-- Login Form -->
    <div class="login-reg-form">
        <!-- Heading -->
        <h4>Login to your Account</h4>
        <br/>
        <!-- Form -->
        {!! Form::open(array(
        'url' => '/admin/login',
        'role' => 'form',
        'name' => 'bookform',
        'id' => 'bookform',
        'method' => 'post',
        'class' => 'form-horizontal'
        ))
        !!}
        <!-- Form Group -->
        <div class="form-group">
            <!-- Label -->
            <label for="user" class="col-sm-3 control-label">Email</label>

            <div class="col-sm-9">
                <!-- Input -->
                {!! Form::email('email', null, array('class' => 'required email form-control',
                'placeholder' => 'you@example.com',
                'autofocus'=>'autofocus')); !!}
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>

            <div class="col-sm-9">
                {!! Form::password('password', array('class' => 'form-control required',
                'placeholder' => 'Password')); !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember Me
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <!-- Button -->
                <button type="submit" class="btn btn-red">Login</button>
                &nbsp;
                <button type="submit" class="btn btn-white">Reset</button>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-9">
            <a href="/password" class="black">Forgot Password ?</a>
        </div>
        {!! Form::close() !!}
        <br/>
    </div>
</div>
<!-- Login Ends -->

<!-- Javascript files -->
<!-- jQuery -->
<script src="/vendor/vcms5/assets/js/jquery.js"></script>

<!-- jQuery validate -->
<script src="/vendor/vcms5/public-assets/admin/js/jquery-validate/jquery.validate.min.js"></script>
@if (Session::get('lang') == 'fr')
    <script type="text/javascript" src="/vendor/vcms5/public-assets/admin/js/jquery-validate/localization/messages_fr.min.js"></script>
@endif
@if (Session::get('lang') == 'es')
    <script type="text/javascript" src="/vendor/vcms5/public-assets/admin/js/jquery-validate/localization/messages_es.min.js"></script>
@endif
<!-- Bootstrap JS -->
<script src="/vendor/vcms5/assets/js/bootstrap.min.js"></script>
<!-- Placeholders JS -->
<script src="/vendor/vcms5/assets/js/placeholders.js"></script>
<!-- Respond JS for IE8 -->
<script src="/vendor/vcms5/assets/js/respond.min.js"></script>
<!-- HTML5 Support for IE -->
<script src="/vendor/vcms5/assets/js/html5shiv.js"></script>

<!-- Javascript for this page -->

<!-- Custom JS-->
<script src="/vendor/vcms5/assets/js/custom.js"></script>

<script>
    $(document).ready(function () {
        $("#bookform").validate({
            errorClass:'text-danger',
            validClass:'text-success',
            errorElement:'span',
            highlight: function (element, errorClass, validClass) {
                $(element).parents("div[class='form-group']").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".text-danger").removeClass(errorClass).addClass(validClass);
            }
        });
    });
</script>

</body>
</html>