@extends('../../master-layout/web_master')


@section('title')
<title>Spine|Home</title>
@endsection



@section('container')
 <section class="block ">
                <div class="container">
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
                    <div class="block">
                        <h2>Selling With Us Is Easy</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-user.png" alt="">
                                        <span>1</span>
                                    </figure>
                                    <h3>Create an Account</h3>
                                    <p>Etiam molestie viverra dui vitae mattis. Ut velit est</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-upload.png" alt="">
                                        <span>2</span>
                                    </figure>
                                    <h3>Submit Your Ad</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-like.png" alt="">
                                        <span>3</span>
                                    </figure>
                                    <h3>Make a Deal</h3>
                                    <p>Nunc ultrices eu urna quis cursus. Sed viverra ullamcorper</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-wallet.png" alt="">
                                        <span>4</span>
                                    </figure>
                                    <h3>Enjoy the Money!</h3>
                                    <p>Integer nisl ipsum, sodales sed scelerisque nec, aliquet sit</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end block-->
                      <div class="block">
                        <h2>Selling With Us Is Easy</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-user.png" alt="">
                                        <span>1</span>
                                    </figure>
                                    <h3>Create an Account</h3>
                                    <p>Etiam molestie viverra dui vitae mattis. Ut velit est</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-upload.png" alt="">
                                        <span>2</span>
                                    </figure>
                                    <h3>Submit Your Ad</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-like.png" alt="">
                                        <span>3</span>
                                    </figure>
                                    <h3>Make a Deal</h3>
                                    <p>Nunc ultrices eu urna quis cursus. Sed viverra ullamcorper</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                            <div class="col-md-3">
                                <div class="feature-box">
                                    <figure>
                                        <img src="assets/icons/feature-wallet.png" alt="">
                                        <span>4</span>
                                    </figure>
                                    <h3>Enjoy the Money!</h3>
                                    <p>Integer nisl ipsum, sodales sed scelerisque nec, aliquet sit</p>
                                </div>
                                <!--end feature-box-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                </div>
                <!--end container-->
                <div class="background" data-background-color="#fff"></div>
                <!--end background-->
            </section>
            <!--end block-->
@endsection