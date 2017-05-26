      <!DOCTYPE html>
  <html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      @include('template/importCss')
      
      <title>Farm Management System</title>

      
    <style type="text/css">
        body{
            display: none;
            background: rgb(230,230,230);
        }
        .container{
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
        .form-group{ width: 100% }
        .form-signin .form-control
        {
            position: relative;
            font-size: 16px;
            height: auto;
            padding-top: 10px;
            padding-right: 10px;
            padding-bottom: 10px;
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
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .form-signin input[type="password"]
        {
            margin-top: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .account-wall
        {
            /*margin-top: 20%;*/
            padding: 40px 0px 20px 0px;
            background-color: #f7f7f7;
            -moz-box-shadow: 4px 5px 6px rgba(0, 0, 0, 0.3),0px 0px 1px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 4px 5px 6px rgba(0, 0, 0, 0.3),0px 0px 1px rgba(0, 0, 0, 0.3);
            box-shadow: 4px 5px 6px rgba(0, 0, 0, 0.3),0px 0px 1px rgba(0, 0, 0, 0.3);
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
            border: 5px solid #8BC231;
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
        .alert{
            position: absolute;
            right:0;
            width: 30%
        }
        .form-control-feedback.left{
            left: 13px !important;
        }
    </style> 
  </head>
  <body class="nav-md">
  @if (session('alert'))
    <div class="alert alert-{{session('alert')['type']}} alert-dismissible fade in " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ session('alert')['title'] }}</strong><br> {{ session('alert')['message'] }}
    </div>
  @endif
    <div class="container">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            
            <div class="row">
                <div class="account-wall">
                    <img class="profile-img" src="{{ url('resources/assets/images/system/logo.jpg') }}"
                    alt="">
                    {!! Form::open(['action' => "UserController@postLogin",'method' => 'POST','class'=>'form-signin']) !!}

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                            {{ Form::text('username',old('username'), ['class' => 'form-control has-feedback-left '.$errors->first('username', 'validate-red'),'placeholder'=>$errors->first('username')?'*'.$errors->first('username'):'Username','autofocus']) }}
                            <span class="glyphicon glyphicon-user form-control-feedback left" aria-hidden="true"></span>
                            {{-- {!!$errors->first('username', '<span class="control-label error-massage" for="username">*:message</span>')!!} --}}
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            {{ Form::password('password', ['class' => 'form-control has-feedback-left '.$errors->first('password', 'validate-red'),'placeholder'=>$errors->first('password')?'*'.$errors->first('password'):'Password','autofocus']) }}
                                <span class="glyphicon glyphicon-lock form-control-feedback left" aria-hidden="true"></span>
                            {{-- {!!$errors->first('password', '<span class="control-label error-massage" for="password">*:message</span>')!!} --}}
                        </div>
                        <br>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            {{ Form::submit('Sign in',['class'=>'btn btn-lg btn-primary btn-block']) }}
                        </div>
                        {{-- 
                        <label class="checkbox pull-left">
                            <input type="checkbox" value="remember-me">
                            Remember me
                        </label>
                        <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                        --}}
                    {!! Form::close() !!}

                    {{-- <a href="#" class="text-center new-account">Create an account </a> --}}
                    <a href="#" class="text-center new-account">Develop By Zaimon</a>
                </div>
            </div>
        </div>
    </div>


    </body>
    @include('template/importJs')

    <script type="text/javascript">
        $(document).ready(function(){
            var bHeight= Math.abs($("body").height());
            var sHeight= $(window).height();
            console.log('bHeight --> '+bHeight);
            console.log('sHeight --> '+sHeight);

            setHeightScreen(sHeight,bHeight);


            $( window ).resize(function() {
                sHeight=$(this).height();
                setHeightScreen(sHeight,bHeight);
            });
            
            function setHeightScreen(sH,bH){
                if(sH > bH){
                    var hg=(sH-bH)*.4;
                    $(".account-wall").css("margin-top",hg);
                }
                $("body").fadeIn();

            }

            $('input').keyup(function(){
                if($(this).val().length > 0){
                    $(this).removeClass('validate-red');
                }
            });
        });
        
    </script>
   
</html>