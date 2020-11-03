@extends('../../master-layout/admin_master')





@section('title')

<title>Spine</title>

@endsection





@section('Main-content-header')

<h1>Assign Virtual Meeting To User</h1>

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



                <span class="btn btn-primary btn-block"><b>Assign VM</b></span>



                <!--                    <ul class="list-group list-group-unbordered">  </ul>-->



                @if(count($result['user_details']->Virtualmeaning) > 0)

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

                        @foreach($result['user_details']->Virtualmeaning as $data)

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

                    <td><input type="checkbox" class="checkBoxClass" name="library[]" value="{{$data->id}}"></td>

                  
                    <td>{{ucwords($data->vm_name)}}</td>                    
                    <td>{{ucwords($data->description)}}</td>    





                </tr>     

                @endforeach

            </tbody>               

        </table>

    </div>

    <!-- /.box-body -->

    @else

    <h2>No VM available</h2>

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

            var user_id = {{$result['user_details']->id}};

            

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