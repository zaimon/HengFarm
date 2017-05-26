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

  <div class="wrap_breadcrumbs">
    {{ $breadcrumbs = new Creitive\Breadcrumbs\Breadcrumbs }}
    {!!
      $breadcrumbs->setListElement('ol')->setDivider('»')
      ->addCrumb('<i class="fa fa-home fa-lg"></i> Home', url()->current());
    !!}
  </div>
  <hr>
  <pre>
 {{--  @if (session('data'))
    <div class="alert alert-{{session('alert')['type']}} alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>{{ session('data')}}</strong> {{ session('alert')['message'] }}
    </div>
  @endif --}}

    data -> {{ $data }}
  </pre>
  @if (session('alert'))
    <div class="alert alert-{{session('alert')['type']}} alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
      </button>
      <strong>{{ session('alert')['title'] }}</strong> {{ session('alert')['message'] }}
    </div>
  @endif
<div class="row">
  <div class="col-xs-12">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Widget Designs</h3>
        </div>

        {{-- <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> --}}
      </div>

      <div class="x_content">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-pagelines"></i>
            </div>
            <div class="count">{{ $data }}</div>
            <h3>Project</h3>
            <p>โครงการทั้งหมด.</p>
          </div>
        </div>

        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-btc"></i>
            </div>
            <div class="count">{{ $data }}</div>
            <h3>Cost</h3>
            <p>ค่าใช้จ่าย.</p>
          </div>
        </div>

        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-money"></i>
            </div>
            <div class="count">{{ $data }}</div>
            <h3>Sale</h3>
            <p>ยอดขาย.</p>
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

