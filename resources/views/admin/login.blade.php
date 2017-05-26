<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('template/importCss')

    <title>Zaimon BBGun Shop</title>
</head>
<body class="nav-md">
    <div class="container">
        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">

            <div class="row">
                <div class="account-wall">

                    <img class="profile-img" src="{{ url('resources/assets/images/fennecfox.png') }}"
                    alt="">
                    <h3 class="text-center "><small>Zaimon BBGun Shop</small></h3>
                    {!! Form::open(['url' => url("/admin/login/process"),'method' => 'POST','class'=>'form-signin']) !!}
                    {{ Form::text('txtUsername','', ['class' => 'form-control','placeholder'=>'Username','autofocus']) }}
                    {{ Form::password('txtPassword', ['class' => 'form-control','placeholder'=>'Password','autofocus']) }}

                    {{ Form::submit('Sign in',['class'=>'btn btn-lg btn-primary btn-block']) }}

                            {{-- 
                            <label class="checkbox pull-left">
                                <input type="checkbox" value="remember-me">
                                Remember me
                            </label>
                            <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                            --}}
                    {!! Form::close() !!}
                </div>
                {{-- <a href="#" class="text-center new-account">Create an account </a> --}}
            </div>
        </div>
    </div>
</body>
    @include('template/importJs')

    <script type="text/javascript">
        $(document).ready(function(){
            var bHeight= $(".account-wall").height();
            var sHeight= $(window).height();
            setHeightScreen(sHeight,bHeight);

            $( window ).resize(function() {
                sHeight=$(this).height();
                setHeightScreen(sHeight,bHeight);
            });

            function setHeightScreen(sH,bH){
                if(sH>bH){
                    var hg=(sH-bH)*0.3;
                    $(".account-wall").css("margin-top",hg);
                }
            }
        });

    </script>

    <style type="text/css">
        body{
            background: white
        }
        .form-signin
        {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading, .form-signin .checkbox
        {
            margin-bottom: 10px;
        }
        .form-signin .checkbox
        {
            font-weight: normal;
        }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .form-signin .form-control:focus
        {
            z-index: 2;
        }
        .form-signin input[type="text"]
        {
            margin-bottom: -1px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            margin-top: 20px;
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }
        .login-title
        {
            color: #555;
            font-size: 18px;
            font-weight: 400;
            display: block;
        }
        .profile-img
        {
        /*width: 96px;
        height: 96px;*/
        width: 160px;
        height: 150px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
    .need-help
    {
        margin-top: 10px;
    }
    .new-account
    {
        display: block;
        margin-top: 10px;
    }
</style>    
</html>