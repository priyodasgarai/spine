@extends('../../master-layout/admin_master')


@section('title')
<title>Spine</title>
@endsection


@section('Main-content-header')
 <h1>Social Media Ads</h1>
@endsection


@section('Main-content')
         <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
<!--                                    <h3 class="box-title">Data Table With Full Features</h3>-->
                                    <a  href="#" class="btn btn-mini btn-primary pull-right button_class">Add new</a>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                 <tr>

                                                <th>Date</th>

                                                <th>ADs Title</th>

                                                <th>ADs Source</th>

                                                <th>URL link</th>

                                                <th>Status</th>

                                                <th>Action</th>

                                            </tr>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>01/10/2020</td>

                                                <td>Trident</td>

                                                <td>Google</td>

                                                <td>

                                                    https://www.google.com

                                                </td>

                                                <td> 
                                                   <span class="btn bg-green btn-flat">  Active  </span>
                                                </td>

                                                <td>

                                                    <a class="btn btn-mini primary"  >

                                                        <i class="fa fa-refresh"></i> Renew     

                                                    </a>

                                                    &nbsp;&nbsp;

                                                    <a href="#"   class="btn btn-mini mergin_one" >

                                                        <i class="fa fa-edit"></i> Edit

                                                    </a> 

                                                    &nbsp;&nbsp;

                                                    <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">

                                                        <i class="fa fa-trash"></i> Delete

                                                    </a>



                                                </td>

                                            </tr>

                                            <tr>

                                                <td>01/10/2020</td>

                                                <td>Trident</td>

                                                <td>Google</td>

                                                <td>

                                                    https://www.google.com

                                                </td>

                                                <td>
                                                     <span class="btn bg-green btn-flat">  Active  </span>
                                                </td>

                                                <td>

                                                    <a class="btn btn-mini primary"  >

                                                        <i class="fa fa-refresh"></i> Renew     

                                                    </a>

                                                    &nbsp;&nbsp;

                                                    <a href="#"   class="btn btn-mini mergin_one" >

                                                        <i class="fa fa-edit"></i> Edit

                                                    </a> 

                                                    &nbsp;&nbsp;

                                                    <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">

                                                        <i class="fa fa-trash"></i> Delete

                                                    </a>



                                                </td>

                                            </tr>

                                            <tr>

                                                <td>01/10/2020</td>

                                                <td>Trident</td>

                                                <td>Google</td>

                                                <td>

                                                    https://www.google.com

                                                </td>

                                                <td>  <span class="btn bg-red btn-flat">  Expired  </span>
                                                    
                                                   
                                                </td>

                                                <td>

                                                    <a class="btn btn-mini primary"  >

                                                        <i class="fa fa-refresh"></i> Renew     

                                                    </a>

                                                    &nbsp;&nbsp;

                                                    <a href="#"   class="btn btn-mini mergin_one" >

                                                        <i class="fa fa-edit"></i> Edit

                                                    </a> 

                                                    &nbsp;&nbsp;

                                                    <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">

                                                        <i class="fa fa-trash"></i> Delete

                                                    </a>



                                                </td>

                                            </tr>

                                            <tr>

                                                <td>01/10/2020</td>

                                                <td>Trident</td>

                                                <td>Google</td>

                                                <td>

                                                    https://www.google.com

                                                </td>

                                                <td> <span class="btn bg-red btn-flat">  Expired  </span>
                                                
                                                </td>

                                                <td>

                                                    <a class="btn btn-mini primary"  >

                                                        <i class="fa fa-refresh"></i> Renew     

                                                    </a>

                                                    &nbsp;&nbsp;

                                                    <a href="#"   class="btn btn-mini mergin_one" >

                                                        <i class="fa fa-edit"></i> Edit

                                                    </a> 

                                                    &nbsp;&nbsp;

                                                    <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">

                                                        <i class="fa fa-trash"></i> Delete

                                                    </a>



                                                </td>

                                            </tr>

                                            <tr>

                                                <td>01/10/2020</td>

                                                <td>Trident</td>

                                                <td>Google</td>

                                                <td>

                                                    https://www.google.com

                                                </td>

                                                <td> 
                                                   <span class="btn bg-red btn-flat">  Expired  </span>
                                                </td>

                                                <td>

                                                    <a class="btn btn-mini primary"  >

                                                        <i class="fa fa-refresh"></i> Renew     

                                                    </a>

                                                    &nbsp;&nbsp;

                                                    <a href="#"   class="btn btn-mini mergin_one" >

                                                        <i class="fa fa-edit"></i> Edit

                                                    </a> 

                                                    &nbsp;&nbsp;

                                                    <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">

                                                        <i class="fa fa-trash"></i> Delete

                                                    </a>



                                                </td>

                                            </tr>

                                            <tr>

                                                <td>01/10/2020</td>

                                                <td>Trident</td>

                                                <td>Google</td>

                                                <td>

                                                    https://www.google.com

                                                </td>

                                                <td>
                                                    <span class="btn bg-green btn-flat">  Active  </span>
                                                </td>

                                                <td>

                                                    <a class="btn btn-mini primary"  >

                                                        <i class="fa fa-refresh"></i> Renew     

                                                    </a>

                                                    &nbsp;&nbsp;

                                                    <a href="#"   class="btn btn-mini mergin_one" >

                                                        <i class="fa fa-edit"></i> Edit

                                                    </a> 

                                                    &nbsp;&nbsp;

                                                    <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">

                                                        <i class="fa fa-trash"></i> Delete

                                                    </a>



                                                </td>

                                            </tr>
                                        </tbody>               
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
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