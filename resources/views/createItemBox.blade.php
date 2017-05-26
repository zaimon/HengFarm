@extends('template.master')

@section('importCss')
  @include('template.importCss')
@endsection
{{-- @section('title', 'AddBox')
--}}
@section('nav_left')
  <style type="text/css">

    .addItemRec{color:white;margin:0; margin-left:5%;padding-left: 7px}
    .addItemRec:hover{color: white;}
    .alert{position: fixed;top: 5%;left:10%;min-width: 80%;z-index: 999}

    table > thead > tr > th{ line-height: 2 !important;}

  </style>
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
          Create Item Box 
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

        {!! Form::open(['url' => 'insertItembox','method' => 'post','class'=>'form-horizontal form-label-left']) !!}

        <div class="form-group">
          {{ Form::label('lblBoxName', 'Box Name', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12')) }}
          <div class="col-md-6 col-sm-6 col-xs-12">
            {{ Form::text('txtBoxName','', ['class' => 'form-control','placeholder'=>'Box Name','autofocus','required']) }}
          </div>
        </div>

        <div class="ln_solid"></div>
        <h3>Item List</h3>
        <div class="table-responsive">
          <table id="tb_itemBox" class="table jambo_table">
            <thead>
              <tr class="headings">
                <th class="column-title" data-name="recNo">No </th>
                <th class="column-title" data-name="recName">Item Name</th>
                <th class="column-title" data-name="recType">Type</th>
                <th class="column-title" data-name="recBuy">Buy Price</th>
                <th class="column-title no-link last">
                  Action
                  <i class="addItemRec btn btn-success btn-xs">
                    <span class="glyphicon glyphicon-plus"></span>
                  </i>
                </th>
                
              </tr>
            </thead>

            <tbody>
              <tr class="">
                <td class="recNo" >1</td>
                <td class="recName" >
                  {{ Form::text('itemName[]',null, ['class' => 'form-control','required','placeholder'=>'Item Name']) }}
                </td>
                <td class="recType" >
                  {{ Form::select('itemType[]', $rs_itemType, 'S',['class'=>'form-control','required']) }}
                </td>
                <td class="recBuy" >
                  {{ Form::number('itemBuy[]',null, ['class' => 'form-control','required','placeholder'=>'Buy Price']) }}
                </td>
                <td class="no-link last text-center">
                 {{--  <i class="action_edit btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></i> --}}
                  <i class="action_deleteRec btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></i>
                </td>
                
              </tr>
            </tbody>
          </table>
        </div>


        <div class="form-group">
          <div class="col-xs-12 text-center">
            {{-- <button type="submit" class="btn btn-primary">Cancel</button> --}}
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>

        
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
  $(document).ready(function(){

    $('.addItemRec').click(function(){
      var elm_tr=$('#tb_itemBox > tbody > tr').first().clone();
      elm_tr.find('input').val('');
      elm_tr.appendTo($('#tb_itemBox > tbody'));
      resetTableNo("tb_itemBox");
      
      $('.action_deleteRec').click(function(){
        var tb = $(this).closest("table");
        var tr = $(this).closest("tr");
        if(tb.children('tbody').find('tr').length>1){
          tr.remove();
          resetTableNo("tb_itemBox");
          showDialog('danger','ข้อความ !','ลบ Record เรียบร้อย');
        }else{
          
        }
      });

    });

    function resetTableNo(tableId){
      $('#'+tableId+' > tbody > tr').each(function(k,v){
        $(this).children("td:first").text(k+1);
      });
    }

    function showDialog(type,title,des){
      var alert=`<div class="alert alert-dismissible alert-`+type+` fade in" role="alert"  >
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h2>`+title+`</h2>
          <h5>`+des+`</h5>
        </div> `;
      $('.right_col').append(alert);
                
      setTimeout(function(){
        $('.alert').fadeOut();
        },2500);

    }
  });
</script>

@endsection