@extends('../../master-layout/web_master')


@section('title')
<title>Spine</title>
@endsection

@section('Main-content-header')
<h1>ASSIGNMENT CHECKLIST / TASK LIST</h1>
@endsection


@section('Main-content')
 <div class="row">  
    <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Question for patient medical conditions</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">               
                <div class="form-group">
                  <label class="callout callout-success">Question : Duration: How long has this condition lasted? Is it similar to a past problem? If so, what was done at that time?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
            
                   <div class="form-group">
                  <label class="callout callout-success">Question : Severity/Character: How bothersome is this problem? Does it interfere with your daily activities? Does it keep you up at night? Try to have them objectively rate the problem. If they are describing pain, ask them to rate it from 1 to 10 with 10 being the worse pain of their life, though first find out what that was so you know what they are using for comparison (e.g. childbirth, a broken limb, etc.). Furthermore, ask them to describe the symptom in terms with which they are already familiar. When describing pain, ask if it's like anything else that they've felt in the past. Knife-like? A sensation of pressure? A toothache? If it affects their activity level, determine to what degree this occurs. For example, if they complain of shortness of breath with walking, how many blocks can they walk? How does this compare with 6 months ago?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                   <div class="form-group">
                  <label class="callout callout-success">Question : Location/Radiation: Is the symptom (e.g. pain) located in a specific place? Has this changed over time? If the symptom is not focal, does it radiate to a specific area of the body?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                  
                   <div class="form-group">
                  <label class="callout callout-success">Question : Have they tried any therapeutic maneuvers?: If so, what's made it better (or worse)?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                  
                   <div class="form-group">
                  <label class="callout callout-success">Question : Pace of illness: Is the problem getting better, worse, or staying the same? If it is changing, what has been the rate of change?</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                  
                   <div class="form-group">
                  <label class="callout callout-success">Question : Are there any associated symptoms? Often times the patient notices other things that have popped up around the same time as the dominant problem. These tend to be related.</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                  
                  
                  <div class="form-group">
                      <button type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
              </form>
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