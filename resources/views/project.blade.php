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
    ->addCrumb('<i class="fa fa-home fa-lg"></i> Home',url('/index'))
    ->addCrumb('<i class="fa fa-pagelines fa-lg"></i> Project', url()->current());
  !!}

@endsection

@section('content')
  <div class="row">

    <div class="x_panel">
      <div class="x_title">
        <h2>
          Project 
          <small></small>
   
        </h2>
        <ul class="nav navbar-right panel_toolbox">
          <a href="{{ url('project/create') }}" class="btn btn-success btn_on_title"> 
            <i class="fa fa-plus"></i> Create
          </a>
        </ul>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        {!! Form::open(['action' => 'ProjectController@getIndex','method' => 'GET','class'=>'form-horizontal form-label-left']) !!}
          <div class="row">
            <div class="form-group">
              <div class="col-sm-6 col-xs-12  pull-right">
                <div class="row has-feedback">
                  {{ Form::text('search',Request::input('search'), ['class' => 'form-control has-feedback-left ','placeholder'=>'ค้นหาข้อมูล']) }}
                  <span class="glyphicon glyphicon-search form-control-feedback left" aria-hidden="true"></span>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="row">
                  <h5 class="control-label pull-left" >Result : {{ $data->total() }} Records </h5>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
               
            <div class="table-responsive">
              <table class="table jambo_table ">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Project Name </th>
                    <th class="column-title">startDate </th>
                    <th class="column-title">expireDate </th>
                    <th class="column-title">type </th>
                    <th class="column-title">status </th>
                    <th class="column-title">created_at </th>
                  </tr>
                </thead>

                <tbody>
                @if (count($data) > 0)
                  @foreach ($data as $index => $rec)
                    <tr class="rec" onclick="window.location='{{ url("project/view/$rec->name") }}'">
                      {{-- <td class=" ">{{ ($data->perPage()*($data->currentPage()-1))+$index+1 }}</td> --}}
                      <td class="col"><a class="btn_process"><i class="fa fa-pagelines fa-lg"></i> &nbsp;  </a> {{ $rec->name }}</td>
                      <td class="col">{{ $rec->startDate }}</td>
                      <td class="col">{{ $rec->expireDate }}</td>
                      <td class="col">{{ $rec->type }}</td>
                      <td class="col">{{ $rec->status }}</td>
                      <td class="col">{{ $rec->created_at }}</td>
                    </tr>
                    {{-- <tr class="rec_child">
                      <td class="col" colspan="7">
                        <div class="action">
                            <p class="btn btn-primary btn-xs" >
                              <i class="glyphicon glyphicon-eye-open"></i>
                            </p>
                            <p class="btn btn-danger btn-xs"  onclick="window.location='{{ url("project/edit/$rec->name") }}'"><i class="glyphicon glyphicon-trash"></i></p>
                                
                        </div>
                      </td>
                    </tr> --}}

                  @endforeach
                  @else
                   <tr class=" ">
                      <td colspan="7" class="text-center">----- ไม่พบข้อมูล -----</td>
                    </tr>
                  @endif 
                </tbody>
              </table>
              <div class="paging form-group text-center">
                {{ $data ->render() }}      
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
  <script>
    $(document).ready(function() {
      $("[name='search']").select();
      $("[name='search']").keydown(function(e){
        if(e.which==13){
          $(this).closest("form").submit()
        }
      });
/*
      $("tr.rec").click(function(){
        // $(this).hasClass('active')?$(this).removeClass('active'):$(this).addClass('active');
        // $(this).next('.rec_child').hasClass('active')?$(this).next('.rec_child').removeClass('active'):$(this).next('.rec_child').addClass('active');
        $(this).next('.rec_child').fadeToggle('fast');
      });*/
    });

  </script>
@endsection

