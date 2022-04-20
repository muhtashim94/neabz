@extends('layouts.event_planer.template')
@section('title', 'Update Event')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Basic Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('update_create_event')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEventTitle">Event Title</label>
                                <input type="text" class="form-control" id="exampleInputEventTitle" required name="title"
                                    placeholder="Be clear and descriptive." value="{{$event->title}}">
                            </div>
                            <div class="form-group">
                                <label>Organizer</label>
                                <select class="form-control" name="organizer_id">
                                    <option value="{{$event->organizer_id}}">{{$event->getOrganizer->name}}</option>
                                    <option>Select Organizer</option>
                                    @foreach ($organizers as $organizer)
                                        <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type_id">
                                            <option value="{{$event->type_id}}">{{$event->getEventType->name}}</option>
                                            <option >Select Type</option>
                                            @foreach ($eventTypes as $eventType)
                                                <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category_id">
                                            <option value="{{$event->category_id}}">{{$event->getEventCategory->name}}</option>
                                            <option>Select Category</option>
                                            @foreach ($eventCategories as $eventCategory)
                                                <option value="{{ $eventCategory->id }}">{{ $eventCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sub-category</label>
                                        <select class="form-control" name="sub_category_id">
                                            <option value="{{$event->sub_category_id}}">{{$event->getEventSubCategory->name}}</option>
                                            <option>Select Sub-category</option>
                                            @foreach ($eventSubCategories as $eventSubCategory)
                                                <option value="{{ $eventSubCategory->id }}">
                                                    {{ $eventSubCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Select Tags</label>
                                <select multiple="" class="form-control" name="tags[]">
                                    @foreach ($event['eventTags'] as $eventTag)
                                    <option selected value="{{ $eventTag->event_tag_id }}">{{ $eventTag->getEventTag->name }}</option>
                                @endforeach
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Location</label>
                            <p>Help people in the area discover your event and let attendees know where to show up.</p>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active get_location" data-location="venue"><a href="#venue" data-toggle="tab"
                                            aria-expanded="true">Venue</a>
                                        <input type="hidden" name="location_get" class="lclass" value="{{ $event->location_type}}" >
                                    </li>
                                    <li class="get_location" data-location="online-event"><a href="#online-event"
                                            data-toggle="tab" aria-expanded="false">Online event</a></li>
                                    <li class="get_location" data-location="to-be-announced"><a href="#to-be-announced"
                                            data-toggle="tab" aria-expanded="false">To be announced</a></li>

                                    <li class="pull-right"><a href="#" class="text-muted"><i
                                                class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane  active" id="venue">
                                        <div class="input-group">
                                            <input type="text" name="location" class="form-control"
                                                placeholder="Search..." value="{{ $event->location}}" >
                                            <span class="input-group-btn">
                                                <button type="submit" name="search" id="search-btn"
                                                    class="btn btn-flat"><i class="fa fa-search"></i>
                                                </button>
                                            </span>

                                        </div>
                                    </div>

                                    <div class="tab-pane " id="online-event">
                                        Online events have unique event pages where you can add links to livestreams and
                                        more

                                    </div>
                                    <div class="tab-pane " id="to-be-announced">

                                    </div>
                                </div>
                            </div>
                            <label>Date and time</label>
                            <p>Tell event-goers when your event starts and ends so they can make plans to attend.</p>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active get_event_type" data-event="single_event"><a href="#tab_single_event"
                                            data-toggle="tab" aria-expanded="true">Single Event</a>
                                        <input type="hidden" name="event_type" class="eclass" value="{{$event->eventDateTime->event_type}}">
                                    </li>
                                    <li class="get_event_type" data-event="recurring_event"><a href="#tab_recurring_event"
                                            data-toggle="tab" aria-expanded="false">Recurring Event</a></li>


                                    <li class="pull-right"><a href="#" class="text-muted"><i
                                                class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_single_event">
                                        <p>Single event happens once and can last multiple days</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Event Starts</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="date" id="start_date" class="form-control pull-right"
                                                            name="event_start" value="{{$event->eventDateTime->event_start}}" required>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>Start Time</label>
                                                        <div class="input-group">
                                                            <input type="time" id="start_time" class="form-control"
                                                                name="start_time" value="{{$event->eventDateTime->start_time}}" required>
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
                                                        <input type="date" id="end_date" class="form-control pull-right"
                                                            name="event_end" value="{{$event->eventDateTime->event_end}}" required>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <label>End Time</label>
                                                        <div class="input-group">
                                                            <input type="time" id="end_time" class="form-control"
                                                                name="end_time" value="{{$event->eventDateTime->end_time}}" required>
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <input type="checkbox" id="start" name="display_start_time" checked value="{{$event->eventDateTime->display_start_time}}">
                                            <label for="start"> Display start time.</label><br>
                                            <p>The start time of your event will be displayed to attendees.</p>
                                        </div>
                                        <div class="form-group">

                                            <input type="checkbox" id="end" name="display_end_time" checked value="{{$event->eventDateTime->display_end_time}}">
                                            <label for="end"> Display end time.</label><br>
                                            <p>The end time of your event will be displayed to attendees.</p>
                                        </div>





                                    </div>

                                    <div class="tab-pane" id="tab_recurring_event">
                                        <p>You’ll be able to set a schedule for your recurring event in the next step. Event
                                            details and ticket types will apply to all instances.</p>
                                        <div class="form-group">
                                            <input type="checkbox" id="end" name="display_end_time" checked value="{{$event->eventDateTime->display_end_time}}">
                                            <label for="end"> Display end time.</label><br>
                                            <p>The end time of your event will be displayed to attendees.</p>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="form-group" data-select2-id="13">
                                <label>Time Zone</label>
                                <select aria-labelledby="time-zone-label"
                                    class="form-control select2 select2-hidden-accessible" role="listbox"
                                    style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                    name="time_zone_id">
                                    <option value="{{$event->time_zone_id}}">{{$event->getTimeZone->name}}</option>
                                    @foreach ($timeZones as $timeZone)
                                        <option value="{{ $timeZone->id }}">{{ $timeZone->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>

                        <input type="hidden" name="event_id" value="{{$id}}">
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right show_detail_btn">Submit</button>
                </div>
                </form>
            </div>

        </div>


    </section>




@endsection


@section('custom-js')

    <script>
        $(document).ready(function() {
            var val = "venue";
            $('.get_location').on('click', function() {
                var val = $(this).attr('data-location');
                $('.lclass').val(val);
            });
            var val1 = "single_event";
            $('.get_event_type').on('click', function() {
                var val1 = $(this).attr('data-event');
                $('.eclass').val(val1);
            });

            $('.show_detail_btn').on('click', function() {
                $(".detail_show").removeAttr("disabled");
            });
        });
    </script>

@endsection
