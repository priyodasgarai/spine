@extends('../../master-layout/web_master')


@section('title')
<title>Spine</title>
@endsection

@section('Main-content-header')
 <h1>TRAINING LIBRARY </h1><small>(Videos/Manuals/Etc..)</small>
@endsection


@section('Main-content')
   <div class="row">
        @if(count($result['assignment_video']) > 0)
         @foreach($result['assignment_video'] as $library)
                        <div class="col-md-4">
                            <!-- AREA CHART -->
                            <div class="box">                                 
                                <input type="hidden" id="library_{{$library->id}}" value="{{json_encode($library)}}"/>
                                <div class="box-body">
                                     @if(!empty($library->library_image))                                
                                <img class="img-responsive" style="width:320px" src="{{asset(trans('labels.107').$library->library_image)}}" alt="Image">
                                @else
                                <img class="img-responsive" style="width:320px" src="{{asset('public/admin-asset/img/no_img.png')}}" alt="Image">
                                <hr>
                                @endif
<!--                                    <img src="{{asset('public/admin-asset/images/library_images/rs=w_360px,h_240px,cg_true.jpg')}}" style="width:320px" alt="Product Image">-->
                                </div>
                                <div class="box-header with-border">
                                    <h3>{{$library->name}}</h3>              
                                </div>
                                <p>
                                    {{$library->description}}
                                </p>
                                <!-- /.box-body -->
                                @if(!empty($library->library_video))
                                 <div>                                     
                                     <a href="#"  onclick="play_video('{{$library->id}}')" class="btn btn-primary">Play</a> 
                                 </div>
                               @endif
                               
                            </div>
                            <!-- /.box -->
                        </div>
         @endforeach
        @else
                <h2> No video assign </h2>
                @endif

                    </div>

                    <!-- /.row -->
                    
                    
                    
                    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Assign Video</h4>
      </div>
      <div class="modal-body">
        <video controls id="video1" style="width: 100%; height: auto; margin:0 auto; frameborder:0;">
<!--          <source src="" type="video/mp4">-->
          Your browser doesn't support HTML5 video tag.
        </video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection


@section('custom_css')
@endsection


@section('custom_js')
<script>
     let link = "{{asset(trans('labels.107'))}}"; 
function play_video(id){ 
    $("#video1").html('');
    let data_details = $("#library_" + id).val();
    let output = $.parseJSON(data_details);
     console.log(output);
  //  alert(output.librarie_id);
    // alert(output);
     let librarie_id = output.userassignment_id;
     let library_video = output.library_video;
    $.post('update-traininglibray-status',

            {

            "_token": "{{ csrf_token() }}", 
            librarie_id: librarie_id,
            }, function (data, status, xhr) {
            console.log(data);

                    if (data.result == true) {
          //  location.reload();
                 //   swal("{{trans('messages.1')}}", data.message, "success");

            } else {
          //  location.reload();
             //       swal("{{trans('messages.4')}}", data.message, "error");

            }

            })
            
            
    
    $("#video1").html('');  
    let file = link +'/'+ library_video;  
    let source = "<source src="+file+" type='video/mp4'></source>";  
    $("#video1").html(source );
    $('#myModal').modal('show');
}
</script>
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