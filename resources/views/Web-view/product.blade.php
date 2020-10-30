@extends('../../master-layout/web_master')


@section('title')
<title>Spine</title>
@endsection

@section('Main-content-header')
 <h1>Products</h1>
@endsection


@section('Main-content')
 <div class="row">
      
        <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>Glider Angled</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/GliderAngled_480x480c4c6.png')}}" style="width:233px;hight:100px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>Black Spine PRO front back</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/BlackSpinePROfrontback_copy_88492a22-a40d-4f86-9aa7-86ddc989964d_480x480db3d.png')}}" style="width:233px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
         <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>Footrest REVERSED medium</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/Footrest_REVERSED_medium43a3.png')}}" style="width:233px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
         <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>Removal Chair</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/IMG_2865_copy_1024x10240df0.png')}}" style="width:233px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
      </div>
      <!-- /.row -->
<div class="row">
      
        <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>Spine PRO Main</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/SpinePRO_Main_copy_1024x102419da.png')}}" style="width:233px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
        <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>Spine PRO front back White</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/SpinePROfrontbackWhite_copy_1024x102411d2.png')}}" style="width:233px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
         <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>Chair</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/rs=w_365,h_365,cg_true.png')}}" style="width:233px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
         <!-- /.col (LEFT) -->
       <div class="col-md-3">
          <!-- AREA CHART -->
          <div class="box">
            <div class="box-header with-border">
                <h3>In-Home Glider Rental</h3>              
            </div>
            <div class="box-body">
              <img src="{{asset('public/admin-asset/images/product_images/05.jpg')}}" style="width:233px" alt="Product Image">
              <p>Product Description : Lorem Ipsum is simply dummy text of the printing and 
                  typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever 
                  since the 1500s,</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (LEFT) -->
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