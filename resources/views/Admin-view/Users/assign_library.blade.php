@extends('../../master-layout/admin_master')





@section('title')

<title>Spine</title>

@endsection





@section('Main-content-header')

<h1>Assign Video To User</h1>

@endsection





@section('Main-content')

<div class="row">

    <div class="col-md-12">



        <!-- Profile Image -->

        <div class="box box-primary">

            <div class="box-body box-profile">               



                @if(!empty($result['user_details']->image))

                <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.105').$result['user_details']->image)}}" alt="Smiley face">

                @else

                <img class="profile-user-img img-responsive img-circle" src="{{asset('public/admin-asset/img/avatar.png')}}" alt="User profile picture">

                @endif



                <h3 class="profile-username text-center">{{$result['user_details']->name}}</h3>



                <span class="btn btn-primary btn-block"><b>Assign Video</b></span>



                <!--                    <ul class="list-group list-group-unbordered">  </ul>-->



                @if(count($result['assignment_video']) > 0)

                <table id="Assign_library" class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th>ID</th>
                            
                            <th>VM Name</th> 
                            
                            <th>Video Name</th>   

                            <th>Video</th> 

                            <th>Image</th> 

                            <th>Amount</th>  

                            <th>Delete</th>



                        </tr>

                    </thead>

                    <tbody>

                        @foreach($result['assignment_video'] as $library)

                        <tr>     

                            <td>{{$library->id}}</td>
                            <td>{{$library->vm_name}}</td>                           
                            
                            <td>{{$library->name}}</td>                    

                            <td> 

                                @if(!empty($library->library_video))

                                <video width="320" height="240" controls>

                                    <source src="{{asset(trans('labels.107').$library->library_video)}}" type="video/mp4">

                                </video>



                                @else

                                <img class="img-responsive" style="width:30px; margin-top: 5px" src="{{asset('public/admin-asset/img/no_img.png')}}" alt="video">

                                <hr>

                                @endif

                            </td>  

                            <td>

                                @if(!empty($library->library_image))                                

                                <img class="img-responsive" style="width:70px; margin-top: 5px" src="{{asset(trans('labels.107').$library->library_image)}}" alt="Image">

                                @else

                                <img class="img-responsive" style="width:30px; margin-top: 5px" src="{{asset('public/admin-asset/img/no_img.png')}}" alt="Image">

                                <hr>

                                @endif

                            </td>  

                            <td>

                                {{$library->price}}

                            </td>              



                            <td>

                                <a onclick="return confirm('Are you sure you want to permanently delete this row?');" 

                                   href="{{ url('/admin/user-library-delete-'.base64_encode($library->librarie_id.'||'.env('APP_KEY').'||'.$library->user_virtualmeaning_id))}}"  class="btn btn-mini" style="margin:1px">

                                    <i class="fa fa-trash"></i> Delete

                                </a>

                            </td>

                        </tr>  

                        @endforeach

                    </tbody>               

                </table>



                @else

                <h2> No video assign </h2>

                @endif



            </div>

            <!-- /.box-body -->

        </div>

        <!-- /.box -->

    </div>

</div>

<!-- /.row -->

<!-- /.row -->

<div class="box">

    <div class="box-header">    

        <h3 class="box-title">Select video for User</h3>

        <button id="bulk_add" class="btn btn-mini btn-primary pull-right button_class">Bulk Add</button>

    </div>

    <!-- /.box-header -->           

    @if(count($result['librarys']) > 0)
 <div class="row">
      @if(count($result['user_details']->Virtualmeaning) > 0)
                <div class="form-group">
                  <label class="col-md-2">Select #VM</label>                  
                  <select class="col-md-8" id="vm_id">
                      <option value="0">Select Virtual Meeting</option>
                      @foreach($result['user_details']->Virtualmeaning as $data)
                      <option value="{{$data->id}}">{{$data->vm_name}}</option>
                       @endforeach
                  </select>
                </div>
       @else
                <h2> No VM assign </h2>
                @endif
            </div>
    <div class="box-body">
       
        <table id="All_library" class="table table-bordered table-striped">

            <thead>

                <tr style="text-align: center">

                    <th>ID</th>

                    <th>Video Name</th>   

                    <th>Video</th> 

                    <th>Image</th> 

                    <th>Amount</th>                 



                </tr>

            </thead>

            <tbody>



                @foreach($result['librarys'] as $library)





                <tr>               

                    <td><input type="checkbox" class="checkBoxClass" name="library[]" value="{{$library->id}}"></td>

                    <td>{{$library->name}}</td>                    

                    <td> 

                        @if(!empty($library->library_video))

                        <video width="320" height="240" controls>

                            <source src="{{asset(trans('labels.107').$library->library_video)}}" type="video/mp4">

                        </video>



                        @else

                        <img class="img-responsive" style="width:30px; margin-top: 5px" src="{{asset('public/admin-asset/img/no_img.png')}}" alt="video">

                        <hr>

                        @endif

                    </td>  

                    <td>

                        @if(!empty($library->library_image))                                

                        <img class="img-responsive" style="width:70px; margin-top: 5px" src="{{asset(trans('labels.107').$library->library_image)}}" alt="Image">

                        @else

                        <img class="img-responsive" style="width:30px; margin-top: 5px" src="{{asset('public/admin-asset/img/no_img.png')}}" alt="Image">

                        <hr>

                        @endif

                    </td>  

                    <td>

                        {{$library->price}}

                    </td>              





                </tr>     

                @endforeach

            </tbody>               

        </table>

    </div>

    <!-- /.box-body -->

    @else

    <h2>No video available</h2>

    @endif

</div>

<!-- /.box -->   

@endsection



@section('custom_css')

<link rel="stylesheet" href="{{asset('public/admin-asset/css/dataTables.bootstrap.min.css')}}">

@endsection





@section('custom_js')

<script src="{{asset('public/admin-asset/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/admin-asset/js/dataTables.bootstrap.min.js')}}"></script>

<script>

    $(function () {

//    $('#Assign_library').DataTable({

//            'paging': true,

//            'lengthChange': true,

//            'searching': false,

//            'ordering': true,

//            'info': true,

//            'autoWidth': true

//    });

            $('#All_library').DataTable({

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

    var library_id = chkArray;

            var vm_id = $("#vm_id").val();
            //console.log(vm_id);
            if(vm_id == "0"){
                alert("Please select Virtual Meeting");
                return false;
            }
            

        $.post('user-library-add',

            {

            "_token": "{{ csrf_token() }}",

            vm_id: vm_id,

            librarie_id: library_id,

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