@extends('../../master-layout/web_master')


@section('title')
<title>Add Address</title>
@endsection



@section('Main-content')
<div class="row">
    <div class="box box-default">
        <div class="box-header with-border">  
            <h3 class="box-title">Add Address </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form role="form" method="post" action="{{url('post-add-address')}}" > 
                    @csrf
                    <!-- text input -->
                    <div class="col-md-6">
                         <div class="form-group">
                            <label>Address Type</label>
                            <select class="form-control" name="address_type">                                
                                <option value=0>Select Address Type </option>
                                <option value=1>Shipping</option>
                                <option value=2>Billing</option>                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name"/>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address"  placeholder="Enter ...">
                                 {{old('address')}}
                            </textarea>     
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name"/>
                        </div>


                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control" placeholder="Enter contact number" />
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>City</label>
                            <input type="text"  name="city" class="form-control" value="{{old('city')}}" placeholder="Enter City"/>               
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State </label>
                            <input type="text"  name="state" value="{{old('state')}}"  class="form-control" placeholder="Enter State"/>               
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Zip Code</label>
                             <input type="text"  name="zipcode" value="{{old('zipcode')}}" class="form-control" placeholder="Enter Zip Code"/>   
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" placeholder="Submit">
                        </div>
                        <!-- /.form-group -->
                    </div>
                </form>
            </div>
            <!-- /.row -->
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