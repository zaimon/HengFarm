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

@section('breadcrumbs')
    {{ $breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs }}
    {!!
      $breadcrumbs->setListElement('ol')->setDivider('»')
      ->addCrumb('<i class="fa fa-home fa-lg"></i> Home',url('index'))
      ->addCrumb('<i class="fa fa-pagelines fa-lg"></i> Project',url('project'))
      ->addCrumb('<i class="fa fa-eye fa-lg"></i> View', url('project/view').'/'.$data->pjName)
      ->addCrumb('<i class="fa fa-gears fa-lg"></i> Process / <i class="fa fa-eye fa-lg"></i> View', url()->current());
    !!}
@endsection

@section('content')
  
  <div class="row">
    <div class="x_panel">
      <div class="x_title">
        <h2>
          View Process ( Project : {{ $data->pjName }} )
          <small></small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{ url("project/view/$data->pjName") }}" class="btn btn-primary btn_on_title"> <i class="fa fa-chevron-left"></i> Back</a> 
          <a href="{{ url("project/view/$data->pjName/process/edit/$data->name") }}" class="btn btn-warning btn_on_title"> <i class="fa fa-edit fa-lg"></i> Edit</a> 
        </ul>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">

          <div class="row form-group col-sm-6 col-xs-12">
            <label class="control-label col-sm-6 col-xs-6 text-right" for="name">Process Name :<span class="required"></span>
            </label>
            <div class=" col-sm-6 col-xs-6">
              {{ Form::label( 'name' ,$data->name, ['class' => 'control-label']) }}
            </div>
          </div>
          <div class="row form-group col-sm-6 col-xs-12">
            <label class="control-label col-md-6 col-sm-6 col-xs-6 text-right" for="startDate">Start Date :<span class="required"></span>
            </label>
            <div class="col-sm-6 col-xs-6">
              {{ Form::label( 'startDate' ,$data->startDate, ['class' => 'control-label']) }}
            </div>
          </div>
          <div class="row form-group col-sm-6 col-xs-12">
            <label class="control-label col-sm-6 col-xs-6 text-right" for="expireDate">ExpireDate :<span class="required"></span>
            </label>
            <div class="col-sm-6 col-xs-6">
              {{ Form::label( 'expireDate' ,$data->expireDate, ['class' => 'control-label']) }}
            </div>
          </div>
          <div class="row form-group col-sm-6 col-xs-12">
            <label class="control-label col-md-6 col-sm-6 col-xs-6 text-right" for="status">Status :<span class="required"></span>
            </label>
            <div class="col-sm-6 col-xs-6">
              {{ Form::label( 'status' ,$data->status, ['class' => 'control-label']) }}
            </div>
          </div>

          <div class="row form-group col-sm-6 col-xs-12">
            <label class="control-label col-md-6 col-sm-6 col-xs-6 text-right" for="status">Cost :<span class="required"></span>
            </label>
            <div class="col-sm-6 col-xs-6">
              {{ Form::label( 'status' ,$data->cost, ['class' => 'control-label']) }}
            </div>
          </div>

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
{{-- 
 {!! Html::script('resources\assets\vendors/iCheck/icheck.min.js')!!}
 {!! Html::script('resources\assets\vendors/nprogress/nprogress.js')!!}
 {!! Html::script('resources\assets\vendors/fastclick/lib/fastclick.js')!!}
  --}}

<!-- Datatables -->
<script>
  $(document).ready(function() {
    
  });

</script>
<!-- /Datatables -->

@endsection

