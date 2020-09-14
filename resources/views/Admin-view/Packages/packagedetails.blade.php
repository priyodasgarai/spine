@extends('../../master-layout/admin_master')


@section('title')
<title>Package Details</title>
@endsection



@section('Main-content-header')
<h1>Package Details</h1>
<!--<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
</ol>-->
@endsection




@section('Main-content')
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                @if(!empty($package->package_image))
                       <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.103').$package->package_image)}}" alt="Smiley face">
                     @else
                      <img src="{{asset('public/admin-asset/img/avatar.png')}}" class="profile-user-img img-responsive img-circle" alt="package Image">
                     @endif
              

              <h3 class="profile-username text-center">{{$package->name}}</h3>
              <p class="text-muted text-center">{{$package->description}}</p>
<!--              <br>
              <div><b>Amount :</b>{{$package->amount}}</div>
              <br>
              <div><b>Status :</b> @if ($package->status==1) 
                        {{trans('labels.26')}} 
                        @else 
                        {{trans('labels.27')}}    
                        @endif </div>    
                <br>
              <div><b>Description :</b> </div>-->

<span class="btn btn-primary btn-block"><b>Assign Programs</b></span>
@if(!empty($package->programs))
              <ul class="list-group list-group-unbordered">
                  
                  
                   <table id="Assign_Programs" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                    <th>description</th> 
                   
                    <th>Status</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($package->programs as $data)
                <tr>               
                    <td>{{$data->id}}</td>
                    <td>{{ucwords($data->name)}}</td>                    
                    <td>{{ucwords($data->description)}}</td>                      
                    <td>
                        @if ($data->status==1) 
                        {{trans('labels.26')}} 
                        @else 
                        {{trans('labels.27')}}    
                        @endif 
                    </td>               
                    <td>
                        <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/admin/package-program-delete-'.base64_encode($data->id.'||'.env('APP_KEY').'||'.$package->id))}}"  class="btn btn-mini" style="margin:1px">
                            <i class="fa fa-trash"></i> {{trans('labels.29')}}
                        </a>
                    </td>
                </tr>          
                @endforeach           


            </tbody>               
        </table>
                  
                  
<!--                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>-->
               
              </ul>
@else 
<ul class="list-group list-group-unbordered">
    No program Find out
</ul>
@endif
             
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>



<div class="box">
    <div class="box-header">    
        <h3 class="box-title">Select Program for Package</h3>
       <button id="bulk_add" class="btn btn-mini btn-primary pull-right button_class">Bulk Add</button>
    </div>
    <!-- /.box-header -->           
    @if(!empty($programs))
    <div class="box-body">
        <table id="All_Programs" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                    <th>description</th> 
                   
                    <th>Status</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $data)
                <tr>               
                    <td><input type="checkbox" class="checkBoxClass" name="program[]" value="{{$data->id}}"></td>
                    <td>{{ucwords($data->name)}}</td>                    
                    <td>{{ucwords($data->description)}}</td>                      
                    <td>
                        @if ($data->status==1) 
                        {{trans('labels.26')}} 
                        @else 
                        {{trans('labels.27')}}    
                        @endif 
                    </td>               
                   
                </tr>          
                @endforeach           


            </tbody>               
        </table>
    </div>
    <!-- /.box-body -->
    @else
    <div class="box-body table-responsive no-padding">
        <h3>  {{trans('messages.15')}} </h3>
    </div>
    @endif
</div>
<!-- /.box -->


@endsection

















@section('Main-content-error-message')
@if(Session::has('flash_message'))  
<div class="alert alert-danger alert-dismissable show" role="alert">     
    {{Session::get('flash_message')}}
    <button type="button" class="close" data-dismiss="alert" aris-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{Session::forget('flash_message')}}
</div>
@endif
@if(Session::has('success_message'))
<div class="alert alert-success alert-dismissable" role="alert">  
    {{Session::get('success_message')}}
    <button type="button" class="close" data-dismiss="alert" aris-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>    
</div>
@endif
@if(Session::has('error_message'))
<div class="alert alert-danger alert-dismissable show" role="alert">     
    {{Session::get('error_message')}}
    <button type="button" class="close" data-dismiss="alert" aris-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@endsection



@section('custom_css')
<link rel="stylesheet" href="{{asset('public/admin-asset/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('custom_js')
<script src="{{asset('public/admin-asset/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin-asset/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(function () {

$('#Assign_Programs').DataTable({
'paging': true,
        'lengthChange': true,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': true
});
  $('#All_Programs').DataTable({
'paging': true,
        'lengthChange': true,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': true
});      
    
    
    })


    $(document).ready(function (){
        $("#bulk_add").click(function () {
             var chkArray = [];
             $(".checkBoxClass:checked").each(function () {
            chkArray.push($(this).val());
        });
       // console.log(chkArray);
        if(chkArray.length != 0){
            var program_id = chkArray;
            var package_id = {{$package->id}};
         
             $.post('package-program-add',
                {
                     "_token": "{{ csrf_token() }}",
                    program_id: program_id,
                    package_id: package_id,                    	
                }, function (data, status) {
                    console.log(data);
            if (data.result == true) {
                location.reload();
                swal("{{trans('messages.1')}}",data.message, "success");
            } else {
                location.reload();
                swal("{{trans('messages.4')}}",data.message, "error");
            }
        })
            
        }else{
            alert('Please select checkBox ') ;
        }  
        
        });
        
    });







</script>
@endsection