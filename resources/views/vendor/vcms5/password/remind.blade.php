<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password</title>

    <link href="/vendor/vcms5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/vcms5/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/vendor/vcms5/css/animate.css" rel="stylesheet">
    <link href="/vendor/vcms5/css/style.css" rel="stylesheet">
    <link href="/vendor/vcms5/css/pnotify.custom.min.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h2>Reset Password</h2>
                <p>
                    Enter your email, and we'll send you a link to reset your password.
                </p>
            </div>
            {!! Form::open(array('role' => 'form', 'name' => 'bookform', 'id' => 'bookform')) !!}
                <div class="form-group">
                    {!! Form::email('email', null, array('class' => 'required email form-control',
                        'placeholder' => 'you@example.com',
                        'autofocus'=>'autofocus')); !!}
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Send Reset Link</button>
            {!! Form::close() !!}

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/vendor/vcms5/js/jquery-2.1.1.js"></script>
    <script src="/vendor/vcms5/js/bootstrap.min.js"></script>
    <script src="/vendor/vcms5/js/jquery.validate.min.js"></script>
    <script src="/vendor/vcms5/js/pnotify.custom.min.js"></script>
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
