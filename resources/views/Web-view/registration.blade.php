@extends('../../master-layout/front_master')


@section('title')
<title>Spine Registration</title>
@endsection


@section('main-content')
   <section class="content">
            <section class="block">
                
                <div class="container">
                    @if(Session::has('flash_message'))
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">×</a>
        {{Session::get('flash_message')}}<strong> !</strong> 
        {{Session::forget('flash_message')}}
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
             <form role="form" method="post"  action="{{url('/registration')}}"  id="" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                <!-- text input -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.14')}}</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Enter Name"  required/>
                    </div>
                     <div class="form-group">
                        <label>{{trans('labels.24')}}</label>
                        <input type="file"  name="image" id="image" class="form-control" accept="image/*">                   
                    </div>
                   
                </div>
                <!-- /.col -->
              
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('labels.15')}}</label>
                        <input type="email"  name="email" id="email" class="form-control" placeholder="Enter email"  value="{{old('amount')}}" required />
                            
                    </div>
                    <!-- /.form-group -->
                     <div class="form-group">
                        <label>{{trans('labels.13')}}</label>
                        <input type="password"  name="password" id="password" class="form-control" placeholder="Enter Password"  value="{{old('password')}}" required />            

                    </div>

                   
                    <!-- /.form-group -->
                </div>
                 <div class="col-md-6">
                    
 
                <div class="form-group">
                        <label>{{trans('labels.19').' '.trans('labels.13')}}</label>
                        <input type="password"  name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter confirm password"  value="{{old('confirm_password')}}" required />            

                    </div>
                     <div class="form-group">
                         <label></label>
                    <input type="submit" class="btn btn-primary" placeholder="{{trans('labels.21')}}">
                </div>
                   
                    <!-- /.form-group -->
                </div>
               
                
                </div>
                
            </form>
<!--                    <div class="row justify-content-center">
                        
                                       
                        
                        <div class="col-md-4">
                            <form class="form clearfix" action="{{url('registration')}}" method="post">@csrf
                                <div class="form-group">
                                    <label for="email" class="col-form-label required">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your Email" required>
                                </div>
                                end form-group
                                <div class="form-group">
                                    <label for="password" class="col-form-label required">Password</label>
                                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                                </div>
                                end form-group
                                <div class="d-flex justify-content-between align-items-baseline">
                                    <label>
                                        <input type="checkbox" name="remember" value="1">
                                        Remember Me
                                    </label>
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </form>
                            
                        </div>
                        end col-md-6
                    </div>-->
                    <!--end row-->
                </div>
                <!--end container-->
            </section>
            <!--end block-->
        </section>
@endsection












@section('secondary-navigation')

@endsection


@section('main-navigation')

@endsection


@section('Hero-Form')

@endsection


@section('page-title')

@endsection




@section('footer-container')

@endsection


@section('footer-background')
  
@endsection


@section('')

@endsection


