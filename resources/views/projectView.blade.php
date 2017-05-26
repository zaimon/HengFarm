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
      ->addCrumb('<i class="fa fa-eye fa-lg"></i> View', url()->current());
    !!}

@endsection

@section('content')
  <div class="row">
    <div class="x_panel">
      <div class="x_title">
        <h2>
          View Project 
          <small></small>
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{ url('project') }}" class="btn btn-primary btn_on_title"> <i class="fa fa-chevron-left"></i> Back</a> 
          <a href="{{ url("project/edit/$data->name") }}" class="btn btn-warning btn_on_title"> <i class="fa fa-edit fa-lg"></i> Edit</a> 
        </ul>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div class="row">
          <div class="row form-group col-sm-6 col-xs-12">
            <label class="control-label col-sm-6 col-xs-6 text-right" for="name">Project Name :<span class="required"></span>
            </label>
            <div class=" col-sm-6 col-xs-6">
              {{ Form::label( 'name' ,$data->name, ['class' => 'control-label']) }}
            </div>
          </div>
          <div class="row form-group col-sm-6 col-xs-12">
            <label class="control-label col-sm-6 col-xs-6 text-right" for="type">Project Type :<span class="required"></span>
            </label>
            <div class="col-sm-6 col-xs-6">
              {{ Form::label( 'type' ,$data->type, ['class' => 'control-label']) }}
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
            <label class="control-label col-sm-6 col-xs-6 text-right" for="expireDate">Expire Date :<span class="required"></span>
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
        </div>

        {!! Form::open(['method' => 'GET','class'=>'form-horizontal form-label-left']) !!}
          <div class="x_title">
            <h2>
              Processes 
              <small></small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">
              <a href="{{ url("project/view/$data->name/process/create") }}" class="btn btn-success btn_on_title"> 
                <i class="fa fa-plus"></i> Create
              </a>
               
            </ul>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table jambo_table ">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Process Name</th>
                    <th class="column-title">startDate </th>
                    <th class="column-title">expireDate </th>
                    <th class="column-title">cost </th>
                    <th class="column-title">status </th>
                    <th class="column-title">created_at </th>
                  </tr>
                </thead>

                <tbody>
                  @if (count($data->processes) > 0)
                    @foreach ($data->processes as $index => $rec)
                      <tr class="rec" onclick="window.location='{{ url("project/view/$data->name/process/view/$rec->name") }}'">
                        <td class="col"><a class="btn_process"><i class="fa fa-gears fa-lg"></i> &nbsp;  </a> {{ $rec->name }}</td>
                        <td class="col">{{ $rec->startDate }}</td>
                        <td class="col">{{ $rec->expireDate }}</td>
                        <td class="col">{{ $rec->cost }}</td>
                        <td class="col">{{ $rec->status }}</td>
                        <td class="col">{{ $rec->created_at }}</td>
                      </tr>
                    @endforeach
                  @else
                   <tr class=" ">
                      <td colspan="7" class="text-center">----- ไม่พบข้อมูล -----</td>
                    </tr>
                  @endif 
                </tbody>
              </table>
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

