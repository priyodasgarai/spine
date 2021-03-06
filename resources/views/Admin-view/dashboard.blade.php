@extends('../../master-layout/admin_master')


@section('title')
<title>Dashboard</title>
@endsection


@section('Main-content')
  <div class="row">
          <div class="box box-default">
            <div class="box-header ">                
            </div>
            <!-- /.box-header -->
            <div class="box-body with-border dark-color">
              <div class="callout bg-primary col-md-4">
                  <a href="{{ url('/admin/users/'.'Enrollments')}}"  class="btn btn-mini" style="margin:1px">
                      <h3>NEW ENROLLMENTS  </h3><small>(Total {{$enrollments}} User)</small>

                <p>(NEWEST SIGN UPS)</p>
                 </a>
              </div>
              <div class="callout bg-primary  col-md-4">
                   <a href="{{ url('/admin/users/'.'Pending')}}"  class="btn btn-mini" style="margin:1px">
                <h3>PENDING</h3><small>(Total {{$pending}} User)</small>

                <p>(AWAITING PAYMENT OR OTHER)</p>
                 </a>
              </div>
              <div class="callout bg-primary col-md-4">
                   <a href="{{ url('/admin/users/'.'Inactive')}}"  class="btn btn-mini" style="margin:1px">
                <h3>INACTIVE</h3><small>(Total {{$inactive}} User)</small>

                <p>(30 Days of Inactivity)</p>
                 </a>
              </div>
             
            </div>
            <!-- /.box-body -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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