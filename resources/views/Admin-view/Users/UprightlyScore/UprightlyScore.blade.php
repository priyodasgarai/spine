@extends('../../../master-layout/admin_master')

@section('title')
<title>Spine</title>
@endsection

@section('Main-content-header')
<h1>Uprightly Score</h1>
@endsection





@section('Main-content')

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                @if(!empty($result['user_details']->image))
                <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.105').$result['user_details']->image)}}" alt="Smiley face">
                @else
                <img class="profile-user-img img-responsive img-circle" src="{{asset('public/admin-asset/img/avatar.png')}}" alt="User profile picture">
                @endif
                <h3 class="profile-username text-center">{{$result['user_details']->name}}</h3>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">

        <div class="row">

            <div class="col-md-6">
                <div class="box">

                    <div class="box-header">    

                        <h3 class="box-title">All Virtual Meeting</h3>

                        <button id="Assign_VM" class="btn btn-mini btn-primary pull-right button_class">Assign VM</button>

                    </div>

                    <!-- /.box-header -->           

                    @if(count($result['Virtualmeaning']) > 0)

                    <div class="box-body">

                        <table id="All_VM" class="table table-bordered table-striped">

                            <thead>

                                <tr style="text-align: center">

                                    <th>ID</th>                       
                                    <th>Name</th>
                                    <th>Description</th>


                                </tr>

                            </thead>

                            <tbody>



                                @foreach($result['Virtualmeaning'] as $data)





                                <tr>               

                                    <td><input type="checkbox" class="VirtualcheckBoxClass" name="VirtualMetting[]" value="{{$data->id}}"></td>


                                    <td>{{ucwords($data->vm_name)}}</td>                    
                                    <td>{{ucwords($data->description)}}</td>    





                                </tr>     

                                @endforeach

                            </tbody>               

                        </table>

                    </div>

                    <!-- /.box-body -->

                    @else

                    <h2>No Virtual Meeting available</h2>

                    @endif

                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header"> 
                        <h3 class="box-title">Assign Virtual Meeting</h3>
                    </div>
                    <div class="box-body">               



                        @if(count($result['user_details']->virtualMeeting) > 0)

                        <table id="Assign_library" class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>ID</th>                       
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Delete</th>



                                </tr>

                            </thead>

                            <tbody>

                                @foreach($result['user_details']->virtualMeeting as $data)

                                <tr>     

                                    <td>{{ucwords($data->id)}}</td>
                                    <td>{{ucwords($data->vm_name)}}</td>                    
                                    <td>{{ucwords($data->description)}}</td>    





                                    <td>

                                        <a onclick="return confirm('Are you sure you want to permanently delete this row?');" 

                                           href="{{ url('/admin/user-vm-delete-'.base64_encode($data->id.'||'.env('APP_KEY').'||'.$result['user_details']->id))}}"  class="btn btn-mini" style="margin:1px">

                                            <i class="fa fa-trash"></i> Delete

                                        </a>

                                    </td>

                                </tr>  

                                @endforeach

                            </tbody>               

                        </table>



                        @else

                        <h2> No VM assign </h2>

                        @endif



                    </div>

                    <!-- /.box-body -->

                </div>
            </div>


        </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="#EducationScore" data-toggle="tab"><strong>Spine Education Score</strong></a></li>
                <li><a href="#SymptomControl" data-toggle="tab"><strong>SymptomControl Score</strong> </a></li>
                <li><a href="#VerticalityScore" data-toggle="tab"><strong>Spine Verticality Score</strong> </a></li>
                <li><a href="#ShapeScore" data-toggle="tab"><strong>Spine Shape Score</strong>  </a></li>
            </ul>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>

    <!-- /.col -->
</div>

<div class="row">
    <div class="nav-tabs-custom">
        <div class="tab-content"  id="tabs">
            <div class="tab-pane" id="EducationScore">               
                <h1> Education Score @if(isset($result['EducationScore'])) :{{$result['EducationScore']}} @endif</h1>
                <!-- /.post -->
                <div class="row">


                    <div class="col-md-6">

                        <div class="box">

                            <div class="box-header">    

                                <h3 class="box-title">Select video for User</h3>

                                <button id="Assign_video" class="btn btn-mini btn-primary pull-right button_class">Assign Video</button>

                            </div>

                            <!-- /.box-header -->           

                            @if(count($result['librarys']) > 0)
                            <div class="row">
                                @if(count($result['user_details']->virtualMeeting) > 0)
                                <div class="form-group">
                                    <label class="col-md-4">Select Virtual Meeting</label>                  
                                    <select class="col-md-6" id="library_vm_id">
                                        <option value="0">Select Virtual Meeting</option>
                                        @foreach($result['user_details']->virtualMeeting as $data)
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





                                        </tr>

                                    </thead>

                                    <tbody>



                                        @foreach($result['librarys'] as $library)





                                        <tr>               

                                            <td><input type="checkbox" class="LibrarycheckBoxClass" name="LibraryVideo[]" value="{{$library->id}}"></td>

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
                    </div>
                    <div class="col-md-6">



                        <!-- Profile Image -->

                        <div class="box box-primary">

                            <div class="box-body box-profile">               





                                <span class="btn btn-primary btn-block"><b>Assign Video</b></span>



                                <!--                    <ul class="list-group list-group-unbordered">  </ul>-->



                                @if(count($result['assignment_video']) > 0)

                                <table id="Assign_library" class="table table-bordered table-striped">

                                    <thead>

                                        <tr>

                                          

                                            <th>VM Name</th> 

                                            <th>Score</th>

                                            <th>Video</th> 


                                            <th>Delete</th>



                                        </tr>

                                    </thead>

                                    <tbody>

                                        @foreach($result['assignment_video'] as $library)

                                        <tr>     

                                            
                                            <td>{{$library->vm_name}}</td>                           

                                          <td>{{$library->score}}</td>             

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

                                                <a onclick="return confirm('Are you sure you want to permanently delete this row?');" 

                                                   href="{{ url('/admin/user-library-delete-'.base64_encode($library->librarie_id.'||'.env('APP_KEY').'||'.$library->user_virtual_id))}}"  class="btn btn-mini" style="margin:1px">

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

            </div>
            <div class="tab-pane" id="SymptomControl">               
                <h1> Symptom Control Score</h1>
                <!-- /.post -->
            </div>
            <div class="tab-pane" id="VerticalityScore">               
                <h1> Verticality Score </h1>
                <!-- /.post -->
            </div>
            <div class="tab-pane" id="ShapeScore">               
                <h1> Shape Score </h1>
                <!-- /.post -->
            </div>

        </div>
    </div>
</div>

@endsection



@section('custom_css')

<link rel="stylesheet" href="{{asset('public/admin-asset/css/dataTables.bootstrap.min.css')}}">

@endsection





@section('custom_js')

<script src="{{asset('public/admin-asset/js/jquery.dataTables.min.js')}}"></script>

<script src="{{asset('public/admin-asset/js/dataTables.bootstrap.min.js')}}"></script>

<script>
    $(document).ready(function(){
    activaTab('EducationScore');
      });           
     
      $("#Assign_VM").click(function () {

    var VirtualchkArray = [];
            $(".VirtualcheckBoxClass:checked").each(function () {
    VirtualchkArray.push($(this).val());
    });
            if (VirtualchkArray.length != 0){
    var Virtual_id = VirtualchkArray;
            var user_id = {{$result['user_details']->id}};
            $.post('user-vm-add',
            {

            "_token": "{{ csrf_token() }}",
                    user_id: user_id,
                    vm_id: Virtual_id,
            }, function (data, status) {
            if (data.result == true) {
            location.reload();
                    swal("{{trans('messages.1')}}", data.message, "success");
            } else {

            location.reload();
                    swal("{{trans('messages.4')}}", data.message, "error");
            }

            });



    } else{

    alert('Please select checkBox ');
    }
    });
      $("#Assign_video").click(function () {

    var chkArray_library = [];

            $(".LibrarycheckBoxClass:checked").each(function () {

    chkArray_library.push($(this).val());

    });

            // console.log(chkArray);

            if (chkArray_library.length != 0){

    var library_id = chkArray_library;

            var library_vm_id = $("#library_vm_id").val();
             var user_id = {{$result['user_details']->id}};
            //console.log(library_vm_id);
            if(library_vm_id == "0"){
                alert("Please select Virtual Meeting");
                return false;
            }
            

        $.post('user-library-add',

            {

            "_token": "{{ csrf_token() }}",

            vm_id: library_vm_id,
            user_id : user_id,
            librarie_id: library_id,

            }, function (data, status) {

       //     console.log(data);

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
    
    
     
     
     
     
    function activaTab(tab){
    $('.nav-tabs a[href="#' + tab + '"]').tab('show');
 };
    $(function () {
    $('#All_VM').DataTable({

    'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true

    });
            $('#All_library').DataTable({

    'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': true

    });
    });
    
    

</script>
<?php /*
  $(function () {

  //    $('#Assign_library').DataTable({

  //            'paging': true,

  //            'lengthChange': true,

  //            'searching': false,

  //            'ordering': true,

  //            'info': true,

  //            'autoWidth': true

  //    });

  $('#All_VM').DataTable({

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
  console.log(chkArray);
  if (chkArray.length != 0){

  var library_id = chkArray;
  var user_id = {{$result['user_details'] - > id}};
  $.post('user-vm-add',
  {

  "_token": "{{ csrf_token() }}",
  user_id: user_id,
  vm_id: library_id,
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

 */
?>


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