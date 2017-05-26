@extends('template.master')

@section('importCss')
  @include('template.importCss')
@endsection
{{-- @section('title', 'AddBox')
--}}
@section('nav_left')

  @include('template.nav_left')
@endsection

@section('nav_top')
  @include('template.nav_top')
@endsection

@section('content')

  <pre>
  </pre>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>
          Create Project 
          <small></small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <span>Today : </span>
          <span class="todayDate">
            <?php  
            $dt = new DateTime();
            echo $dt->format('Y-m-d');
            ?>    
          </span>   
        </ul>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        {!! Form::open(['action' => 'insertItembox','method' => 'post','class'=>'form-horizontal form-label-left']) !!}

          

        
        {!! Form::close() !!}
        

      </div>
    </div>
  </div>
</div>
      
        
@endsection

@section('footer')
  @include('template.footer')
@endsection

@section('importJs')
  @include('template.importJs')
<script type="text/javascript">

</script>

@endsection