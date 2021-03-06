@extends('../../master-layout/web_master')


@section('title')
<title>Profile</title>
@endsection



@section('Main-content')
<div class="row">
    <div class="box box-default">
        <div class="box-header with-border">  
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form role="form" method="post" action="{{url('registration/'.base64_encode($userDetails->id.'||'.env('APP_KEY')))}}" enctype="multipart/form-data"> 
                    @csrf
                    <!-- text input -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{$userDetails->name}}" name="name"/>
                        </div>
                        <div class="form-group">
                            <label>User Image</label>
                            <input type="file" class="form-control" name="image"/>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="date" name="date_of_birth" value="{{$userDetails->date_of_birth}}" class="form-control" placeholder="Enter Date Of Birth" />
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>City</label>
                            <input type="text"  name="city" class="form-control" value="{{$userDetails->city}}" placeholder="Enter City"/>               
                        </div>


                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number_1" value="{{$userDetails->contact_number_1}}" class="form-control" placeholder="Enter contact number" />
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>UT</label>
                            <input type="text"  name="UT" class="form-control" value="{{$userDetails->UT}}" placeholder="Enter UT"/>               
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alternative Contact Number </label>
                            <input type="text"  name="contact_number_2" value="{{$userDetails->contact_number_2}}"  class="form-control" placeholder="Enter alternative contact number"/>               
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" name="gender">
                                @if(isset($userDetails->gender))
                                <option value="{{$userDetails->gender}}" selected="">{{$userDetails->gender}} </option>
                                @endif
                                <option value="NA">Select Gender </option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="transgender">Transgender</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address" id="description" placeholder="Enter ...">
                                  @if(!empty($userDetails->address))
                                {{$userDetails->address}}
                                @else
                                {{old('address')}}
                                @endif 
                            </textarea>     
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