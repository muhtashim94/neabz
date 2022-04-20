@extends('layouts.event_planer.template')
@section('title', 'Event Calendar')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">

@endsection
@section('mainBody')

<section class="content">
<div class="container" id="event-calender">

    <div class="row">
     
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Calendar</h3>
          </div>
          <!-- /.box-header -->

          
            <div class="box-body">
                <div class="row">

                    <div class="col-md-4">
                        <div class="input-group">
                        <label>Search</label>
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                        class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Event status</label>
                            <select class="form-control">
                                <option>All</option>
                                <option>Published</option>
                                <option>Draft</option>
                                <option>Past</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Organizer</label>
                            <select class="form-control">
                                <option>Select Organizer</option>
                                <option>Unnamed organizer</option>
                                <option>abc</option>
                            </select>
                        </div>
                    </div>

                </div>

                <div id='calendar'></div>


            
        
            

                             
               </div>  
              </div>

            </div>
    
         
        </div>
    

      </div>
    
    </div>
    </div>
 
  </section>
  



@endsection

@section('custom-js')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

<script>
$(document).ready(function() {

$('#calendar').fullCalendar({
  header: {
    left: 'prev,next,today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay'
  }
});

});

</script>

@endsection