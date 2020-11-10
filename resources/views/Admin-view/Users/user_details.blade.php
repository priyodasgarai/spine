@extends('../../master-layout/admin_master')


@section('title')
<title>Spine</title>
@endsection


@section('Main-content-header')
<h1>Users Details</h1>
@endsection


@section('Main-content')
<div class="row">
<!--    <div class="box-header">              
        <a  href="{{ url('/admin/user-assign-vm-'.base64_encode($result['user_details']->id.'||'.env('APP_KEY')))}}" class="btn btn-mini btn-primary  button_class">Assign VM</a>
    <a  href="{{ url('/admin/user-assign-library-'.base64_encode($result['user_details']->id.'||'.env('APP_KEY')))}}" class="btn btn-mini btn-primary pull-right button_class">Assign library</a>
    </div>-->
    <div class="col-md-6">
        @if(!empty($result['user_details']))
        <!-- Profile Image -->
        <div class="box box-primary">           
            <div class="box-body box-profile">

                @if(!empty($result['user_details']->image))
                <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.105').$result['user_details']->image)}}" alt="Smiley face">
                @else
                <img class="profile-user-img img-responsive img-circle" src="{{asset('public/admin-asset/img/avatar.png')}}" alt="User profile picture">
                @endif

                <h3 class="profile-username text-center">{{$result['user_details']->name}}</h3>



                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Name : </b> <a class="pull-right">{{$result['user_details']->name}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email : </b> <a class="pull-right">{{$result['user_details']->email}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Address : </b> <a class="">{{$result['user_details']->address}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Phon no : </b> <a class="pull-right">{{$result['user_details']->contact_number_1}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Alternative Phone Number : </b> <a class="pull-right">{{$result['user_details']->contact_number_2}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Gender : </b> <a class="pull-right">{{$result['user_details']->gender}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Date Of Birth : </b> <a class="pull-right">{{$result['user_details']->date_of_birth}} </a>
                    </li>
                    <li class="list-group-item">
                        <b>RecNo : </b> <a class="pull-right">{{$result['user_details']->RecNo}}</a>
                    </li>

                </ul>

            </div>
            <!-- /.box-body -->
        </div>
        @endif
        <!-- /.box -->
    </div> 
    <div class="col-md-6">        
        @if(count($result['user_details']->user_address)> 0)
        <!-- Profile Image -->
        @foreach($result['user_details']->user_address as $address)

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
    @foreach($result['user_details']->user_document as $doc)
    <div class="col-md-4">
        <div class="box box-primary">

            <div class="box-body">

                @if($doc->file_type == 2)
                <strong><i class="fa fa-medkit margin-r-5"></i> Medical Documents Files</strong>
                @if(!empty($doc->file_name))
                <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/delete-file-'.base64_encode($doc->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                    <i class="fa fa-trash"></i> {{trans('labels.29')}}
                </a> 
                <img class="profile-user-img img-responsive img-circle" src="{{asset(trans('labels.105').$doc->file_name)}}" alt="Documents">
                <a href="{{asset(trans('labels.105').$doc->file_name)}}" download><i class="fa fa-download"></i> Download</a>

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
                <a href="{{asset(trans('labels.105').$doc->file_name)}}" download><i class="fa fa-download"></i> Download</a>
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

<div class="row">
       <div class="box-header with-border">
             
              <h3 class="box-title">Course Progress</h3>
            </div>
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-user-circle"></i>
              <h3 class="box-title">OTVs</h3>
            </div>
            <!-- /.box-header -->
           
            <div class="box-body">               
                 @if(!empty($result['assignment_video']))
                 <?php $sl = 1; ?>
                 @foreach($result['assignment_video'] as $library)
                 @if($library->userassignment_status == '0')
                 <div class="bg-blue col-md-1 badge " style="margin:1px">               
                <h2><i class="icon fa fa-check"></i> </h2>                
              </div>
                @else

                  <div class="bg-blue col-md-1 badge"  style="margin:1px">               
                  <h2><i class=""></i>{{$library->userassignment_id}}</h2>               
              </div>
              @endif
      <?php $sl++ ;?>
                 @endforeach
                 @endif
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-user-circle"></i>
              <h3 class="box-title">VMs</h3>
            </div>

           <div class="box-body">
                 @if(!empty($Virtualmeaning))
                 <?php $sl = 1; ?>
                 @foreach($Virtualmeaning as $meaning)
                 @if (in_array($meaning->id, $user_meaning_id))
    <div class="bg-blue col-md-1 badge " style="margin:1px">               
                <h2><i class="icon fa fa-check"></i> </h2>                
              </div>
@else

                  <div class="bg-blue col-md-1 badge"  style="margin:1px">               
                  <h2><i class=""></i>{{$meaning->id}}</h2>               
              </div>
              @endif
      <?php $sl++ ;?>
                 @endforeach
                 @endif
            </div>
            
          </div>
          <!-- /.box -->
        <!-- /.col -->

      </div>
      <!-- /.row -->

<div class="row">

    <!-- general form elements disabled -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Question and answer for patient medical conditions</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form role="form">               
                <div class="form-group">
                    <label class="callout callout-success">Question : Duration: How long has this condition lasted? Is it similar to a past problem? If so, what was done at that time?</label>
                    <textarea class="form-control" disabled>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</textarea>
                </div>

                <div class="form-group">
                    <label class="callout callout-success">Question : Severity/Character: How bothersome is this problem? Does it interfere with your daily activities? Does it keep you up at night? Try to have them objectively rate the problem. If they are describing pain, ask them to rate it from 1 to 10 with 10 being the worse pain of their life, though first find out what that was so you know what they are using for comparison (e.g. childbirth, a broken limb, etc.). Furthermore, ask them to describe the symptom in terms with which they are already familiar. When describing pain, ask if it's like anything else that they've felt in the past. Knife-like? A sensation of pressure? A toothache? If it affects their activity level, determine to what degree this occurs. For example, if they complain of shortness of breath with walking, how many blocks can they walk? How does this compare with 6 months ago?</label>
                    <textarea class="form-control" disabled>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</textarea>
                </div>
                <div class="form-group">
                    <label class="callout callout-success">Question : Location/Radiation: Is the symptom (e.g. pain) located in a specific place? Has this changed over time? If the symptom is not focal, does it radiate to a specific area of the body?</label>
                    <textarea class="form-control" disabled>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</textarea>
                </div>

                <div class="form-group">
                    <label class="callout callout-success">Question : Have they tried any therapeutic maneuvers?: If so, what's made it better (or worse)?</label>
                    <textarea class="form-control" disabled>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</textarea>
                </div>

                <div class="form-group">
                    <label class="callout callout-success">Question : Pace of illness: Is the problem getting better, worse, or staying the same? If it is changing, what has been the rate of change?</label>
                    <textarea class="form-control" disabled>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</textarea>
                </div>

                <div class="form-group">
                    <label class="callout callout-success">Question : Are there any associated symptoms? Often times the patient notices other things that have popped up around the same time as the dominant problem. These tend to be related.</label>
                    <textarea class="form-control" disabled>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.</textarea>
                </div>





            </form>
        </div>
        <!-- /.box-body -->
    </div>


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