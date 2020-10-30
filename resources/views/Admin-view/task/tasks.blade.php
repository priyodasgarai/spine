@extends('../../master-layout/admin_master')


@section('title')
<title>Spine</title>
@endsection


@section('Main-content-header')
  <h1>ASSIGNMENT CHECKLIST / TASK LIST</h1>
@endsection


@section('Main-content')
           <div class="row">
                         <div class="box">
    <div class="box-header">
<!--        <h3 class="box-title">Task List</h3>-->
        <a  href="#" class="btn btn-mini btn-primary pull-right button_class">Add new</a>
    </div>
    <!-- /.box-header -->           
        <div class="box-body">
        <table id="category" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>SL No</th>    
                    <th>Question</th> 
                    <th>Status </th>
                     <th>Action </th>
                </tr>
            </thead>
            <tbody>
                    <tr>               
                    <td>01</td>   
                    <td><p> Duration: How long has this condition lasted? Is it similar to a past problem? If so, what was done at that time?</p></td>                    
                    <td>Active</td>               
                    <td>    
                        &nbsp;&nbsp;
                        <a href="#"   class="btn btn-mini mergin_one" >
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        &nbsp;&nbsp;
                        <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        &nbsp;&nbsp; 
                    </td>
                </tr>     
                 <tr>               
                    <td>02</td>   
                    <td><p>  Location/Radiation: Is the symptom (e.g. pain) located in a specific place? Has this changed over time? If the symptom is not focal, does it radiate to a specific area of the body?</p></td>                    
                    <td>Active</td>               
                    <td>    
                        &nbsp;&nbsp;
                        <a href="#"   class="btn btn-mini mergin_one" >
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        &nbsp;&nbsp;
                        <a onclick="return confirm('Are you sure you want to permanently delete this row?');" href="#"  class="btn btn-mini" style="margin:1px">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                        &nbsp;&nbsp; 
                    </td>
                </tr>    
                               
            </tbody>               
        </table>
    </div>
    <!-- /.box-body -->
    </div>                    
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