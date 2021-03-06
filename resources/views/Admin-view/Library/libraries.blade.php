@extends('../../master-layout/admin_master')


@section('title')
<title>Library</title>
@endsection



@section('Main-content-header')
<h1>Library</h1>
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
        <a  href="{{url('/admin/add-edit-library')}}" class="btn btn-mini btn-primary pull-right button_class">{{trans('labels.31')}}</a>
    </div>
    <!-- /.box-header -->           
    @if(!empty($libraries))
    <div class="box-body">
        <table id="category" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
<!--                    <th>description</th> -->
                    <th>Amount</th>
                    <th>Image</th>    
                    <th>Video</th> 
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($libraries as $data)
                <tr>               
                    <td>{{ucwords($data->id)}}</td>
                    <td>{{ucwords($data->name)}}</td>                    
<!--                    <td>{{ucwords($data->description)}}</td>  -->
                    <td>{{ucwords($data->price)}}</td>    		                    
                    <td>                    
                     @if(!empty($data->library_image))
                       <img class="img-circle" style="width:70px; margin-top: 10px" src="{{asset(trans('labels.107').$data->library_image)}}" alt="Smiley face">
                     @else
                      <img src="{{asset('public/admin-asset/img/noimg.jpg')}}" style="width:70px; margin-top: 10px" class="img-circle" alt="package Image">
                     @endif
                    </td>
                     <td>
                         @if(!empty($data->library_video))
                       <video width="320" height="240" controls>
  <source src="{{asset(trans('labels.107').$data->library_video)}}" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">

</video>
                     @else
                      <img src="{{asset('public/admin-asset/img/noimg.jpg')}}" style="width:70px; margin-top: 10px" class="img-circle" alt="package Image">
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
                        <input type="hidden" id="library_details_{{$data->id}}" value="{{json_encode($data)}}">
                        @if ($data->status==1)  
                        <a class="btn btn-mini primary" onclick="change_library_status('{{base64_encode(env('APP_KEY').'||'.$data->id)}}')" >
                            <i class="fa fa-circle"></i> {{trans('labels.27')}}     
                        </a>
                        @else 
                        <a class="btn btn-mini primary" onclick="change_library_status('{{base64_encode(env('APP_KEY').'||'.$data->id)}}')" >
                            <i class="fa fa-circle"></i> {{trans('labels.26')}}     
                        </a>
                        @endif  
<!--                        &nbsp;&nbsp;
                         <a href="{{ url('/admin/library-details-'.base64_encode($data->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                            <i class="fa fa-bookmark"></i> {{trans('labels.44')}}
                        </a>-->
                        &nbsp;&nbsp; 
                        <a href="{{ url('/admin/add-edit-library/'.base64_encode($data->id.'||'.env('APP_KEY')))}}"   class="btn btn-mini mergin_one" >
                            <i class="fa fa-edit"></i> {{trans('labels.28')}}
                        </a>
                        &nbsp;&nbsp;
                        <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/admin/delete-library-'.base64_encode($data->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
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
function change_library_status(id){
                var dec = window.atob(id);
                var res = dec.split('||');
                var data_id = res[1];
                var data_details = $("#library_details_" + data_id).val();
                var output = $.parseJSON(data_details);
        if (output.status == 1){
            var status = 0;
            } else{
            var status = 1;
            }
$.post('update-library-status',
{
        "_token": "{{ csrf_token() }}",
        library_id: data_id,
        status: status
}, function (data, status, xhr) {
//console.log(data);
if (data.result == true) {
swal("{{trans('messages.1')}}", data.message, "success");
        window.location.href = 'library';
} else{
swal("{{trans('messages.4')}}", data.message, "error");
        window.location.href = 'library';
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