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
      ->addCrumb('<i class="fa fa-edit fa-lg"></i> Edit', url()->current());
    !!}
@endsection


@section('content')
<div class="row">
  <div class="x_panel">
    <div class="x_title">
      <h2>
        Edit Project 
        <small></small>
      </h2>
      <ul class="nav navbar-right panel_toolbox">
        <a href='{{ url("project/view/$data->name") }}' class="btn btn-primary"> <i class="fa fa-chevron-left"></i> กลับ</a>
      </ul>

      <div class="clearfix"></div>
    </div>
    <div class="x_content">

       {!! Form::open(['action'=> ['ProjectController@postEdit',$data->name],'method' => 'POST','class'=>'form-horizontal form-label-left']) !!}

        <div class="col-md-12 col-sm-12 col-xs-12">
             
          <div class="table-responsive">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ชื่อโครงการ *<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {{ Form::text('name',$data->name,['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('name', 'validate-red'),'autofocus']) }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">ประเภท *<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {{ Form::select('type',
                  [""=>"Please Select","1"=>"type1","2"=>"type2","3"=>"type3"],$data->type,
                  ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('type', 'validate-red')]
                ) }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="startDate">วันที่เริ่มโครงการ *<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {{ Form::date('startDate',$data->startDate, ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('startDate', 'validate-red')]) }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expireDate">วันที่สิ้นสุดโครงการ *<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {{ Form::date('expireDate',$data->expireDate, ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('expireDate', 'validate-red')]) }}
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">สถานะโครงการ *<span class="required"></span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                {{ Form::select('status',
                  [""=>"Please Select","1"=>"status1","2"=>"status2","3"=>"status3"],$data->status,
                  ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('status', 'validate-red')]
                ) }}
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-4 col-xs-offset-4">
                {{ Form::submit('บันทึก',['class'=>'btn btn-lg btn-success btn-block']) }}
              </div>
            </div>
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

