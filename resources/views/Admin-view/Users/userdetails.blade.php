@extends('../../master-layout/admin_master')


@section('title')
<title>User Details</title>
@endsection



@section('Main-content-header')
<h1>User Details</h1>
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
                    @if(!empty($user_package->image))
                    <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.105').$user_package->image)}}" alt="Smiley face">
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('public/admin-asset/img/avatar.png')}}"  alt="User Image">
                    @endif
                    <h3 class="profile-username text-center">{{$user_package->name}}</h3>
                    <p class="text-muted text-center">{{$user_package->email}}</p>

                    <span class="btn btn-primary btn-block"><b>Assign Packages</b></span>
                    @if(!empty($user_package->packages))
                    <ul class="list-group list-group-unbordered">


                        <table id="Assign_Packages" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>    
                                    <th>description</th> 
                                    <th>Amount</th>                  
                                    <th>Status</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user_package->packages as $data)
                                <tr>               
                                    <td>{{$data->id}}</td>
                                    <td>{{ucwords($data->name)}}</td>                    
                                    <td><p>{{ucwords($data->description)}}</p></td>     
                                    <td>{{$data->amount}}</td>  
                                    <td>
                                        @if ($data->status==1) 
                                        {{trans('labels.26')}} 
                                        @else 
                                        {{trans('labels.27')}}    
                                        @endif 
                                    </td>               
                                    <td>
                                        <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/admin/user-package-delete-'.base64_encode($data->id.'||'.env('APP_KEY').'||'.$user_package->id))}}"  class="btn btn-mini" style="margin:1px">
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
        <h3 class="box-title">Select Package for User</h3>
        <button id="bulk_add" class="btn btn-mini btn-primary pull-right button_class">Bulk Add</button>
    </div>
    <!-- /.box-header -->           
    @if(!empty($packages))
    <div class="box-body">
        <table id="All_Packages" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                    <th>description</th> 
                    <th>Amount</th>                 

                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach($packages as $data)
                <tr>               
                    <td><input type="checkbox" class="checkBoxClass" name="program[]" value="{{$data->id}}"></td>
                    <td>{{ucwords($data->name)}}</td>                    
                    <td><p>{{ucwords($data->description)}}</p></td>  
                    <td>{{ucwords($data->amount)}}</td>              
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
    $('#id="Assign_Packages"').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true
    });
            $('#id="All_Packages"').DataTable({
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
            if (chkArray.length != 0){
    var package_id = chkArray;
            var user_id = {{$user_package->id}};
            $.post('user-package-add',
            {
            "_token": "{{ csrf_token() }}",
                    user_id: user_id,
                    package_id: package_id,
            }, function (data, status) {
            //console.log(data);
                    if (data.result == true) {
            location.reload();
                    swal("{{trans('messages.1')}}", data.message, "success");
            } else {
            location.reload();
                    swal("{{trans('messages.4')}}", data.message, "error");
            }
            })

    } else{
    alert('Please select checkBox ');
    }

    });
    });







</script>
@endsection