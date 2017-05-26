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
      ->addCrumb('<i class="fa fa-gears fa-lg"></i> Process / <i class="fa fa-edit fa-lg"></i> Edit', url()->current());
    !!}
@endsection

@section('content')
<div class="row">
  
  <div class="x_panel">
    <div class="x_title">
      <h2>
        Edit Process 
        <small></small>
      </h2>
      <ul class="nav navbar-right panel_toolbox">
        <a href="{{ url("project/view/$data->pjName/process/view/$data->name") }}" class="btn btn-primary btn_on_title"> <i class="fa fa-chevron-left"></i> Back</a>  
      </ul>

      <div class="clearfix"></div>
    </div>
    <div class="x_content">

      {!! Form::open(['action' => ['ProcessController@postEdit',$data->pjName,$data->name],'method' => 'POST','class'=>'form-horizontal form-label-left']) !!}
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Process Name *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('name',old('name')?old('name'):$data->name, ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('name', 'validate-red'),'autofocus']) }}
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cost">Cost *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::number('cost',old('cost')?old('cost'):$data->cost, ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('cost', 'validate-red'),'autofocus']) }}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="startDate">Start Date *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::date('startDate',old('startDate')?old('startDate'):$data->startDate, ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('startDate', 'validate-red')]) }}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="expireDate">Expire Date *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::date('expireDate',old('expireDate')?old('expireDate'):$data->expireDate, ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('expireDate', 'validate-red')]) }}
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status *<span class="required"></span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::select('status',
              ['',"1"=>"status1","2"=>"status2","3"=>"status3"],old('status')?old('status'):$data->status,
              ['class' => 'form-control col-md-7 col-xs-12 '.$errors->first('status', 'validate-red')]
            ) }}
          </div>
        </div> 

        <div class="form-group">
          <div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-4">
            {{ Form::submit('Edit Process',['class'=>'btn btn-lg btn-success btn-block']) }}
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