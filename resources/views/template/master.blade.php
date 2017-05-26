<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  @yield('importCss')

  <title>@yield('title')</title>
  <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"> -->

</head>
<body class="nav-md">
  @if (session('alert'))
    <div class="alert alert-{{session('alert')['type']}} alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong class="title">{{ session('alert')['title'] }}</strong>&nbsp;&nbsp; <span class="message">{{ session('alert')['message'] }}</span>
    </div>
  @endif
  <div class="container body">
    <div class="main_container">

      @yield('nav_left')
      @yield('nav_top')

      <!-- page content -->    
      <div class="right_col" role="main">
        <div class="container">

          <div class="row">
            <div class="col-xs-6 col-sm-8">
              <div class="row wrap_breadcrumbs">
                @yield('breadcrumbs')
              </div>
            </div>
            <div class="col-xs-6 col-sm-4 pull-right text-right">
              <div class="cur_date">
                <span>Today : </span>
                <span class="todayDate">
                  <?php  
                  $dt = new DateTime();
                  echo $dt->format('Y-m-d');
                  ?>    
                </span>
              </div> 
            </div>
          </div>
          <hr>
          @yield('content')
          <!-- /page content -->  

      
        </div>
      </div>
      @yield('footer')
    </div>

    
  </div>
  @yield('importJs')
</body>
</html>