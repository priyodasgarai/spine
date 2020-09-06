@extends('../../master-layout/admin_master')


@section('title')
<title>{{$title}}</title>
@endsection



@section('Main-content-header')
<h1>{{$title}}</h1>
<!--<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
</ol>-->
@endsection

@section('Main-content')
<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
    <div class="box-header with-border">
        <!--          <h3 class="box-title">{{$title}}</h3>         -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <form role="form" method="post" 
                  @if(empty($Packagedata->id))
                  action="{{url('/admin/add-edit-package')}}"
                  @else
                  action="{{url('/admin/add-edit-package/'.base64_encode($Packagedata->id.'||'.env('APP_KEY')))}}"
                  @endif
                  name="" id="" enctype="multipart/form-data">
                @csrf
                <!-- text input -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.14')}}</label>
                        <input type="text" class="form-control" name="name" id="name" 
                               @if(!empty($Packagedata->name))
                                value="{{$Packagedata->name}}" 
                                @else
                                value="{{old('name')}}" 
                                @endif
                                />
                    </div>
                     <div class="form-group">
                        <label>{{trans('labels.24')}}</label>
                        <input type="file"  name="package_image" id="package_image" class="form-control" accept="image/*">
                    @if(!empty($Packagedata->package_image))
                    <div style="height:100px;">
                     <img class="" style="width:70px; margin-top: 10px" src="{{asset(trans('labels.103').$Packagedata->package_image)}}" alt="Smiley face">
                     &nbsp;
                     <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/admin/delete-package-image-'.base64_encode($Packagedata->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                            <i class="fa fa-trash"></i> {{trans('labels.29')}}
                        </a>
                    
                    </div>
                     @endif
                    </div>
                   
                </div>
                <!-- /.col -->
              
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.42')}}</label>
                        <input type="number"  name="amount" id="amount" class="form-control" placeholder="Enter amount"
                             @if(!empty($Packagedata->amount))
                                value="{{$Packagedata->amount}}" 
                                @else
                                value="{{old('amount')}}" 
                                @endif
                               />
                    </div>
                    <!-- /.form-group -->
                     <div class="form-group">
                        <label>{{trans('labels.43')}}</label>
                        <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter ...">
                                  @if(!empty($Packagedata->description))
                                {{$Packagedata->description}}
                                @else
                                {{old('description')}}
                                @endif 
                                  </textarea>                

                    </div>

                   
                    <!-- /.form-group -->
                </div>
                 <div class="col-md-6">
                    
 <div class="form-group">
                    <input type="submit" class="btn btn-primary" placeholder="{{trans('labels.21')}}">
                </div>
                
                   
                    <!-- /.form-group -->
                </div>
               
                
                
                
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.box-body -->

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

@endsection
@section('custom_js')

@endsection