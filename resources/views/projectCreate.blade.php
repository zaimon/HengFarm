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
      ->addCrumb('<i class="fa fa-home fa-lg"></i> Home',url('/'))
      ->addCrumb('<i class="fa fa-pagelines fa-lg"></i> Project',url('project'))
      ->addCrumb('<i class="fa fa-plus fa-lg"></i> Create', url()->current());
    !!}
@endsection

@section('content')
<div class="row">
  @if (session('alert'))
    <div class="alert alert-{{session('alert')['type']}} alert-dismissible fade in " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>{{ session('alert')['title'] }}</strong><br> {{ session('alert')['message'] }}
    </div>
  @endif
  <div class="x_panel">
    <div class="x_title">
      <h2>
        Create Project 
        <small></small>
      </h2>
      <ul class="nav navbar-right panel_toolbox">
        <a href="{{ url('project') }}" class="btn btn-primary"> <i class="fa fa-chevron-left"></i> กลับ</a>  
      </ul>

      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      {!! Form::open(['action' => 'ProjectController@postCreate','method' => 'POST','class'=>'form-horizontal form-label-left']) !!}
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ชื่อโครงการ *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name',old('name'), ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('name', 'validate-red'),'autofocus']) }}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">ประเภท *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('type',
              ['',"1"=>"type1","2"=>"type2","3"=>"type3"],old('type'),
              ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('type', 'validate-red')]
            ) }}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="startDate">วันที่เริ่มโครงการ *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::date('startDate',old('startDate'), ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('startDate', 'validate-red')]) }}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expireDate">วันที่สิ้นสุดโครงการ *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::date('expireDate',old('expireDate'), ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('expireDate', 'validate-red')]) }}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">สถานะโครงการ *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('status',
              ['',"1"=>"status1","2"=>"status2","3"=>"status3"],old('status'),
              ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('status', 'validate-red')]
            ) }}
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
            {{ Form::submit('สร้างโครงการ',['class'=>'btn btn-lg btn-success btn-block']) }}
          </div>
        </div>
      {!! Form::close() !!}
      

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
  $(document).ready(function(){
      
      $('input,select').change(function(){
          if($(this).val().length > 0){
              $(this).removeClass('validate-red');
          }
      });
      
  });
</script>

@endsection