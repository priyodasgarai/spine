@extends('../../master-layout/admin_master')


@section('title')
<title>Users</title>
@endsection



@section('Main-content-header')
<h1>Users</h1>
<!--<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
</ol>-->
@endsection




@section('Main-content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Table With Full Features</h3>
        <a  href="{{url('/admin/add-edit-user')}}" class="btn btn-mini btn-primary pull-right button_class">{{trans('labels.31')}}</a>
    </div>
    <!-- /.box-header -->           
    @if(!empty($users))
    <div class="box-body">
        <table id="category" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                    <th>Email</th>   
                    <th>Image</th>   
                    
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $data)
                <tr>               
                    <td>{{ucwords($data->id)}}</td>
                    <td>{{ucwords($data->name)}}</td>                    
                    <td>{{ucwords($data->email)}}</td>   
                    <td>                    
                     @if(!empty($data->image))
                       <img class="img-circle" style="width:70px; margin-top: 10px" src="{{asset(trans('labels.105').$data->image)}}" alt="Smiley face">
                     @else
                      <img src="{{asset('public/admin-asset/img/avatar.png')}}" style="width:70px; margin-top: 10px" class="img-circle" alt="User Image">
                     @endif
                    </td>
                    <td>
                        @if ($data->status==1) 
                        {{trans('labels.26')}} 
                        @else 
                        {{trans('labels.27')}}    
                        @endif 
                    </td>               
                    <td>
                        <input type="hidden" id="user_details_{{$data->id}}" value="{{json_encode($data)}}">
                        @if ($data->status==1)  
                        <a class="btn btn-mini primary" onclick="change_user_status('{{base64_encode(env('APP_KEY').'||'.$data->id)}}')" >
                            <i class="fa fa-circle"></i> {{trans('labels.27')}}     
                        </a>
                        @else 
                        <a class="btn btn-mini primary" onclick="change_user_status('{{base64_encode(env('APP_KEY').'||'.$data->id)}}')" >
                            <i class="fa fa-circle"></i> {{trans('labels.26')}}     
                        </a>
                        @endif  
                        &nbsp;&nbsp;
                        <a href="{{ url('/admin/add-edit-user/'.base64_encode($data->id.'||'.env('APP_KEY')))}}"   class="btn btn-mini mergin_one" >
                            <i class="fa fa-edit"></i> {{trans('labels.28')}}
                        </a>
                        &nbsp;&nbsp;
                        <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/admin/delete-user-'.base64_encode($data->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                            <i class="fa fa-trash"></i> {{trans('labels.29')}}
                        </a>
                        &nbsp;&nbsp; 
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

$('#category').DataTable({
'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true
})
        })
function change_user_status(id){
                var dec = window.atob(id);
                var res = dec.split('||');
                var data_id = res[1];
                var data_details = $("#user_details_" + data_id).val();
                var output = $.parseJSON(data_details);
        if (output.status == 1){
            var status = 0;
            } else{
            var status = 1;
            }
$.post('update-users-status',
{
        "_token": "{{ csrf_token() }}",
        user_id: data_id,
        status: status
}, function (data, status, xhr) {
//console.log(data);
if (data.result == true) {
swal("{{trans('messages.1')}}", data.message, "success");
        window.location.href = 'users';
} else{
swal("{{trans('messages.4')}}", data.message, "error");
        window.location.href = 'users';
}
});
        /*  .done(function() { 
         alert('Request done!'); 
         }).fail(function(jqxhr, settings, ex) { 
         alert('failed, ' + ex); 
         }); */
}
</script>
@endsection