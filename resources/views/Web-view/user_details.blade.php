@extends('../../master-layout/web_master')


@section('title')
<title>Spine</title>
@endsection


@section('Main-content-header')
<h1>Users Details</h1>
@endsection


@section('Main-content')
<div class="row">
    <div class="col-md-6">
        @if(!empty($user_details))
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-header">              
                <a  href="{{ url('update-details')}}" class="btn btn-mini btn-primary  button_class">Edit Details</a>
                <a  href="{{ url('add-address')}}" class="btn btn-mini btn-primary pull-right button_class" >Add Address</a>
            </div>
            <div class="box-body box-profile">

                @if(!empty($user_details->image))
                <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.105').$user_details->image)}}" alt="Smiley face">
                @else
                <img class="profile-user-img img-responsive img-circle" src="{{asset('public/admin-asset/img/avatar.png')}}" alt="User profile picture">
                @endif

                <h3 class="profile-username text-center">{{$user_details->name}}</h3>



                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Name : </b> <a class="pull-right">{{$user_details->name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email : </b> <a class="pull-right">{{$user_details->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Address : </b> <a class="">{{$user_details->address}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Phon no : </b> <a class="pull-right">{{$user_details->contact_number_1}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Alternative Phone Number : </b> <a class="pull-right">{{$user_details->contact_number_2}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Gender : </b> <a class="pull-right">{{$user_details->gender}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Date Of Birth : </b> <a class="pull-right">{{$user_details->date_of_birth}} </a>
                    </li>
                    <li class="list-group-item">
                        <b>RecNo : </b> <a class="pull-right">{{$user_details->RecNo}}</a>
                    </li>

                </ul>

            </div>
            <!-- /.box-body -->
        </div>
        @endif
        <!-- /.box -->
    </div> 
    <div class="col-md-6">        
        @if(count($user_details->user_address)> 0)
        <!-- Profile Image -->
        @foreach($user_details->user_address as $address)

        <div class="box box-primary col-md-6">

            <div class="box-body box-profile">               

                <h3 class="profile-username text-center">
                    @if($address->address_type == 1)
                    Shipping Address
                    @elseif($address->address_type == 2)
                    Billing Address
                    @endif
                </h3>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>First Name : </b> <a class="pull-right">{{$address->first_name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Last Name : </b> <a class="pull-right">{{$address->last_name}}</a>
                    </li>

                    <li class="list-group-item">
                        <b>Address : </b> <a class="">{{$address->address}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>City : </b> <a class="pull-right">{{$address->city}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>State : </b> <a class="pull-right">{{$address->state}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Zip Code : </b> <a class="pull-right">{{$address->zipcode}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Phon no : </b> <a class="pull-right">{{$address->contact_number_1}}</a>
                    </li>                   

                </ul>

            </div>

            <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/delete-address-'.base64_encode($address->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                <i class="fa fa-trash"></i> {{trans('labels.29')}}
            </a>


            <!-- /.box-body -->
        </div>


        @endforeach
        @endif

    </div>
</div>
<div class="row">
    <div class="box-header with-border">
        <h3 class="box-title">User Document </h3>
    </div>
    @foreach($user_details->user_document as $doc)
    <div class="col-md-6">
        <div class="box box-primary">

            <div class="box-body">

                @if($doc->file_type == 2)
                <strong><i class="fa fa-medkit margin-r-5"></i> Medical Documents Files</strong>
                @if(!empty($doc->file_name))
                <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/delete-file-'.base64_encode($doc->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                    <i class="fa fa-trash"></i> {{trans('labels.29')}}
                </a> 
                <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.105').$doc->file_name)}}" alt="Documents">

                <hr>
                @else
                <img class="profile-user-img img-responsive img-circle" src="{{asset('public/admin-asset/img/no_img.png')}}" alt="Documents">
                <hr>
                @endif
                @elseif($doc->file_type == 1)
                <strong><i class="fa fa-video-camera margin-r-5"></i> Medical Video Files</strong>
                @if(!empty($doc->file_name))
                <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/delete-file-'.base64_encode($doc->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                    <i class="fa fa-trash"></i> {{trans('labels.29')}}
                </a> 
                <video width="320" height="240" controls>
                    <source src="{{asset(trans('labels.105').$doc->file_name)}}" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                </video>

                <hr>
                @else
                <img src="{{asset('public/admin-asset/img/noimg.jpg')}}" style="width:70px; margin-top: 10px" class="img-circle" alt="package Image">
                @endif
                @endif


            </div>
        </div>
    </div>
    @endforeach
</div>       
@endsection

@section('custom_css')
@endsection


@section('custom_js')
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