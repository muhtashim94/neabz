@extends('layouts.event_planer.template')
@section('title', 'Copy Event')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Copy Event</h3>
                        <p>Your event copy will have the same event info and settings, without attendee information.</p>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form action="{{ route('publish') }}" method="GET">
                            <div class="form-group">
                                <label for="exampleInputEventTitle">Event Title</label>
                                <input type="text" class="form-control" id="exampleInputEventTitle"
                                    value="Copy of Food Event" placeholder="Be clear and descriptive.">
                            </div>
                            <div class="form-group">
                                <label>Summary</label>
                                <textarea class="form-control" rows="3"
                                    placeholder="Write a short event summary to get attendees excited.">Food Festival</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Event Starts</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" id="start_date" class="form-control pull-right"
                                                name="start_date" value="2022-03-09">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>Start Time</label>
                                            <div class="input-group">
                                                <input type="time" id="start_time" class="form-control" name="start_time"
                                                    value="19:30">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Event Ends</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" id="end_date" class="form-control pull-right" name="end_date"
                                                value="2022-03-09">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bootstrap-timepicker">
                                        <div class="form-group">
                                            <label>End Time</label>
                                            <div class="input-group">
                                                <input type="time" id="end_time" class="form-control" name="end_time"
                                                    value="19:30">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-info pull-right">Copy Event</button>
                            </div>
                         </form>
                    </div>
                </div>

            </div>


        </div>




    </section>




@endsection
