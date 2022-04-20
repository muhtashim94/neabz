@extends('layouts.event_planer.template')
@section('title', 'Edit Publish')
@section('mainBody')

    <section class="content">

        <div class="row">

            <div class="col-md-6">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">

                    <div class="tab-content">
                        <h2 class="page-header">Publish Your Event</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">
                                        <h3 class="widget-user-username">{{$event->title}}</h3>
                                        <h5 class="widget-user-desc">  {{(Carbon\Carbon::parse($eventTicket['sales_start_date_time'])->toDayDateTimeString())}}</h5>
                                    </div>

                                    <div class="widget-user-image">
                                        <img class="img-circle" src="{{asset($event->event_image)}}" width="200px" height="200px"
                                            alt="User Avatar">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">${{$eventTicket->price}}</h5>
                                                    <span class="description-text">Price</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">{{$eventTicket->available_quantity}}</h5>
                                                    <span class="description-text">Tickets</span>
                                                </div>
                                                <!-- /.description-block -->
                                            </div>
                                            <p class="comment-text" style="margin-right: 20px; margin-left:20px;">
                                               {{$event->event_summary}}
                                            </p>
                                            <!-- /.col -->
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>

                                </div>
                                <form action="{{ route('update_publish') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="public" name="public"
                                                    id="optionsRadios1" value="public" checked>
                                                <span class="eds-text-color--grey-800">Public</span><br>
                                                Shared on Eventbrite and search engines
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="private" name="public"
                                                    id="optionsRadios2" value="private">
                                                <span class="eds-text-color--grey-800">Private</span><br>
                                                Only available to a selected audience
                                            </label>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 audience">
                                            <div class="form-group">
                                                <label>Choose your audience</label>
                                                <select class="form-control" name="audience">
                                                    <option>Anyone with the link</option>
                                                    <option>Only people with an Eventbrite invitation</option>
                                                    <option>Only people with the password</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <h4>When should we publish your event?</h4>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="publish" id="optionsRadios1" value="publish_now"
                                                    checked>
                                                Publish Now
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="publish" id="optionsRadios2"
                                                    value="schedule_for_later">
                                                Schedule for later
                                            </label>
                                        </div>

                                    </div>

                                    <div class="bootstrap-timepicker">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date:</label>

                                                    <div class="input-group">
                                                        <input type="date" id="start_date" class="form-control pull-right" value="{{$eventPublish->date}}"
                                                            name="date">

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Time:</label>

                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="time" id="start_time" class="form-control" value="{{$eventPublish->time}}"
                                                            name="time">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /.form group -->

                                    </div>


                                    <h4>Will this event ever be public?</h4>
                                    <div class="form-group">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="privacy" id="optionsRadios1" value="No, Keep it private"
                                                    checked>
                                                No, keep it private
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="privacy" id="optionsRadios2"
                                                    value=" Yes, schedule to share publicly">
                                                Yes, schedule to share publicly
                                            </label>
                                        </div>

                                    </div>


                                    <!-- /.widget-user -->
                            </div>
                        </div>

                    </div>
                    <!-- /.tab-content -->
                </div>
                            <input type="hidden" name="event_id" value="{{$id}}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
                </form>
                <!-- nav-tabs-custom -->
            </div>
        </div>
    </section>




@endsection
@section('custom-js')
    <script>
        $(".private").click(function() {
            $(".audience").show();
        });

        $(".public").click(function() {
            $(".audience").hide();
        });

        $(document).ready(function() {
            $(".audience").hide();
        });
    </script>
@endsection
