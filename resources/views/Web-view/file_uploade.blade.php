@extends('../../master-layout/web_master')


@section('title')
<title>Spine</title>
@endsection

@section('Main-content-header')
 <h1>FILE UPLOADER</h1>
@endsection


@section('Main-content')
  <div class="row">
         <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Medical Files</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('/document-upload')}}" enctype="multipart/form-data"> 
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>User Name</label>
                  <input type="text" class="form-control" value="@if(!empty(Auth::guard('web')->user())){{Auth::guard('web')->user()->name}}@endif" disabled/>
                  <input type="hidden" class="form-control" value="1" name="file_type"/>
                </div>                
                <div class="form-group">
                  <label for="exampleInputFile">Select multiple files file for uploaded</label>
                  <input type="file" multiple="" name="video"/>

                  <p class="help-block">Upload medical files for Spine Solutions</p>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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