@extends('template.master')

{{-- @section('title', 'AddBox')
--}}
@section('nav_left')
@include('template.nav_left')
@endsection

@section('nav_top')
@include('template.nav_top')
@endsection

@section('content')



<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>
          ItemBox 
          <small>Manage ItemBox</small>
        </h2>

        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <div id="form_1" class="form-horizontal" >

          <div class="form-group form-inline">
            <label class="col-sm-4 control-label"></label>
            <div class="col-sm-8">
              <div class="input-group">
                <input type="text" id="txtSearch" class="form-control" placeholder="Search Item Box">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-primary" > 
                    <i class="glyphicon glyphicon-search"></i> 
                  </button>
                </span>
              </div>
            </div>
          </div>

          <div class="ln_solid"></div>
        </div>


        <div class="table-responsive">
          <table id="tbSearch_itemBox" class="table jambo_table">
            <thead>
              <tr class="headings">
                <th class="column-title">Invoice </th>
                <th class="column-title">Invoice Date </th>
                <th class="column-title">Order </th>
                <th class="column-title">Bill to Name </th>
                <th class="column-title">Status </th>
                <th class="column-title">Amount </th>
                <th class="column-title no-link last"><span class="nobr">Action</span>
                </th>
                <th class="bulk-actions" colspan="7">
                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                </th>
              </tr>
            </thead>

            <tbody>
              <tr class="even pointer">
                <td class=" ">121000040</td>
                <td class=" ">May 23, 2014 11:47:56 PM </td>
                <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                <td class=" ">John Blank L</td>
                <td class=" ">Paid</td>
                <td class="a-right a-right ">$7.45</td>
                <td class=" last"><a href="#">View</a></td>
              </tr>
              <tr class="even pointer">
                <td class=" ">121000040</td>
                <td class=" ">May 23, 2014 11:47:56 PM </td>
                <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                <td class=" ">John Blank L</td>
                <td class=" ">Paid</td>
                <td class="a-right a-right ">$7.45</td>
                <td class=" last"><a href="#">View</a></td>
              </tr>
              <tr class="even pointer">
                <td class=" ">121000040</td>
                <td class=" ">May 23, 2014 11:47:56 PM </td>
                <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                <td class=" ">John Blank L</td>
                <td class=" ">Paid</td>
                <td class="a-right a-right ">$7.45</td>
                <td class=" last"><a href="#">View</a></td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>


@endsection



@section('footer')
@include('template.footer')
@endsection


@section('importBinary')
@include('template.importBinary')
<script type="text/javascript">

</script>
<style type="text/css">
  #tbSearch_itemBox > tbody > tr:hover{ cursor: pointer;box-shadow: 0px 2px 3px 0px rgba(91,192,222,1);color:black;    text-shadow: 0px 0px 1px rgb(100,100,100);}
</style>
@endsection