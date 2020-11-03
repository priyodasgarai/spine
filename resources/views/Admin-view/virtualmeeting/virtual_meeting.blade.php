@extends('../../master-layout/admin_master')


@section('title')
<title>Spine</title>
@endsection


@section('Main-content-header')
  <h1>Virtual Meeting</h1>
@endsection


@section('Main-content')
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
<!--              <h3 class="box-title">Responsive Hover Table</h3>-->
            <a  href="{{url('/admin/add-edit-Virtualmeaning')}}" class="btn btn-mini btn-primary pull-right button_class">{{trans('labels.31')}}</a>
<!--              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>-->
            </div>
            <!-- /.box-header -->
            @if(!empty($Virtualmeanings))
            <div class="box-body table-responsive no-padding">
              <table id="virtualmeaning" class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Status</th>   
                   <th>Action</th>
                  
                </tr>
                 @foreach($Virtualmeanings as $data)
                <tr>               
                    <td>{{ucwords($data->id)}}</td>
                    <td>{{ucwords($data->vm_name)}}</td>                    
                    <td>{{ucwords($data->description)}}</td>                      
                    <td>
                        @if ($data->status==1) 
                        {{trans('labels.26')}} 
                        @else 
                        {{trans('labels.27')}}    
                        @endif 
                    </td>               
                    <td>
                        <input type="hidden" id="virtualmeaning_details_{{$data->id}}" value="{{json_encode($data)}}">
                        @if ($data->status==1)  
                        <a class="btn btn-mini primary" onclick="change_Virtualmeaning_status('{{base64_encode(env('APP_KEY').'||'.$data->id)}}')" >
                            <i class="fa fa-circle"></i> {{trans('labels.27')}}     
                        </a>
                        @else 
                        <a class="btn btn-mini primary" onclick="change_Virtualmeaning_status('{{base64_encode(env('APP_KEY').'||'.$data->id)}}')" >
                            <i class="fa fa-circle"></i> {{trans('labels.26')}}     
                        </a>
                        @endif  
                        &nbsp;&nbsp;
                        <a href="{{ url('/admin/add-edit-Virtualmeaning/'.base64_encode($data->id.'||'.env('APP_KEY')))}}"   class="btn btn-mini mergin_one" >
                            <i class="fa fa-edit"></i> {{trans('labels.28')}}
                        </a>
                        &nbsp;&nbsp;
                        <a onclick="return confirm('{{trans('labels.32')}}');" href="{{ url('/admin/delete-Virtualmeaning-'.base64_encode($data->id.'||'.env('APP_KEY')))}}"  class="btn btn-mini" style="margin:1px">
                            <i class="fa fa-trash"></i> {{trans('labels.29')}}
                        </a>
                        &nbsp;&nbsp; 
                    </td>
                </tr>          
                @endforeach  
              </table>
            </div>
             @else
    <div class="box-body table-responsive no-padding">
        <h3>  {{trans('messages.15')}} </h3>
    </div>
    @endif
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection

@section('custom_css')
<link rel="stylesheet" href="{{asset('public/admin-asset/css/fullcalendar.min.css')}}">
<link rel="stylesheet" href="{{asset('public/admin-asset/css/fullcalendar.print.min.css')}}" media="print">
@endsection


@section('custom_js')
<!-- <script src="{{asset('public/admin-asset/js/jquery-ui.min.js')}}"></script>-->
  <script src="{{asset('public/admin-asset/js/moment.js')}}"></script>
   
   
   <script src="{{asset('public/admin-asset/js/fullcalendar.min.js')}}"></script>
  <script>
      
      $('#virtualmeaning').DataTable({
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true
})
      
      
      function change_Virtualmeaning_status(id){
                var dec = window.atob(id);
                var res = dec.split('||');
                var data_id = res[1];
                var data_details = $("#virtualmeaning_details_" + data_id).val();
                var output = $.parseJSON(data_details);
        if (output.status == 1){
            var status = 0;
            } else{
            var status = 1;
            }
$.post('update-Virtualmeaning-status',
{
        "_token": "{{ csrf_token() }}",
        Virtualmeaning_id: data_id,
        status: status
}, function (data, status, xhr) {
//console.log(data);
if (data.result == true) {
swal("{{trans('messages.1')}}", data.message, "success");
        window.location.href = 'Virtualmeaning';
} else{
swal("{{trans('messages.4')}}", data.message, "error");
        window.location.href = 'Virtualmeaning';
}
});
       
}
      
      
      
      
      
      
//  $(function () {
//
//    /* initialize the external events
//     -----------------------------------------------------------------*/
//    function init_events(ele) {
//      ele.each(function () {
//
//        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
//        // it doesn't need to have a start or end
//        var eventObject = {
//          title: $.trim($(this).text()) // use the element's text as the event title
//        }
//
//        // store the Event Object in the DOM element so we can get to it later
//        $(this).data('eventObject', eventObject)
//
//        // make the event draggable using jQuery UI
//        $(this).draggable({
//          zIndex        : 1070,
//          revert        : true, // will cause the event to go back to its
//          revertDuration: 0  //  original position after the drag
//        })
//
//      })
//    }
//
//    init_events($('#external-events div.external-event'))
//
//    /* initialize the calendar
//     -----------------------------------------------------------------*/
//    //Date for the calendar events (dummy data)
//    var date = new Date()
//    var d    = date.getDate(),
//        m    = date.getMonth(),
//        y    = date.getFullYear()
//    $('#calendar').fullCalendar({
//      header    : {
//        left  : 'prev,next today',
//        center: 'title',
//        right : 'month,agendaWeek,agendaDay'
//      },
//      buttonText: {
//        today: 'today',
//        month: 'month',
//        week : 'week',
//        day  : 'day'
//      },
//      //Random default events
//      events    : [
//        {
//          title          : 'All Day Event',
//          start          : new Date(y, m, 1),
//          backgroundColor: '#f56954', //red
//          borderColor    : '#f56954' //red
//        },
//        {
//          title          : 'Long Event',
//          start          : new Date(y, m, d - 5),
//          end            : new Date(y, m, d - 2),
//          backgroundColor: '#f39c12', //yellow
//          borderColor    : '#f39c12' //yellow
//        },
//        {
//          title          : 'Meeting',
//          start          : new Date(y, m, d, 10, 30),
//          allDay         : false,
//          backgroundColor: '#0073b7', //Blue
//          borderColor    : '#0073b7' //Blue
//        },
//        {
//          title          : 'Lunch',
//          start          : new Date(y, m, d, 12, 0),
//          end            : new Date(y, m, d, 14, 0),
//          allDay         : false,
//          backgroundColor: '#00c0ef', //Info (aqua)
//          borderColor    : '#00c0ef' //Info (aqua)
//        },
//        {
//          title          : 'Birthday Party',
//          start          : new Date(y, m, d + 1, 19, 0),
//          end            : new Date(y, m, d + 1, 22, 30),
//          allDay         : false,
//          backgroundColor: '#00a65a', //Success (green)
//          borderColor    : '#00a65a' //Success (green)
//        },
//        {
//          title          : 'Click for Google',
//          start          : new Date(y, m, 28),
//          end            : new Date(y, m, 29),
//          url            : 'http://google.com/',
//          backgroundColor: '#3c8dbc', //Primary (light-blue)
//          borderColor    : '#3c8dbc' //Primary (light-blue)
//        }
//      ],
//      editable  : true,
//      droppable : true, // this allows things to be dropped onto the calendar !!!
//      drop      : function (date, allDay) { // this function is called when something is dropped
//
//        // retrieve the dropped element's stored Event Object
//        var originalEventObject = $(this).data('eventObject')
//
//        // we need to copy it, so that multiple events don't have a reference to the same object
//        var copiedEventObject = $.extend({}, originalEventObject)
//
//        // assign it the date that was reported
//        copiedEventObject.start           = date
//        copiedEventObject.allDay          = allDay
//        copiedEventObject.backgroundColor = $(this).css('background-color')
//        copiedEventObject.borderColor     = $(this).css('border-color')
//
//        // render the event on the calendar
//        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
//        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
//
//        // is the "remove after drop" checkbox checked?
//        if ($('#drop-remove').is(':checked')) {
//          // if so, remove the element from the "Draggable Events" list
//          $(this).remove()
//        }
//
//      }
//    })
//
//    /* ADDING EVENTS */
//    var currColor = '#3c8dbc' //Red by default
//    //Color chooser button
//    var colorChooser = $('#color-chooser-btn')
//    $('#color-chooser > li > a').click(function (e) {
//      e.preventDefault()
//      //Save color
//      currColor = $(this).css('color')
//      //Add color effect to button
//      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
//    })
//    $('#add-new-event').click(function (e) {
//      e.preventDefault()
//      //Get value and make sure it is not null
//      var val = $('#new-event').val()
//      if (val.length == 0) {
//        return
//      }
//
//      //Create events
//      var event = $('<div />')
//      event.css({
//        'background-color': currColor,
//        'border-color'    : currColor,
//        'color'           : '#fff'
//      }).addClass('external-event')
//      event.html(val)
//      $('#external-events').prepend(event)
//
//      //Add draggable funtionality
//      init_events(event)
//
//      //Remove event from text input
//      $('#new-event').val('')
//    })
//  })
</script>
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