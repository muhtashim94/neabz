@extends('layouts.admin.template')
@section('title', 'Event Planner')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    {{-- <div class="box-header with-border">
                        <h3 class="box-title">Event Planner</h3>
                    </div> --}}
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <h4>{{$organizer->name}}</h4>
                            </div>
                            <div class="col-md-6">

                                <img class="img-circle" src="{{ asset($organizer->image) }}"
                                    style="width: auto; height: 86px;" alt="User Avatar">
                            </div>
                        </div>

                        <div class="row">
                            <label for="events">Events</label>
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#upcomming-events" data-toggle="tab"
                                            aria-expanded="true">Upcomming</a>
                                    </li>
                                    <li><a href="#past-events" data-toggle="tab" aria-expanded="false">Past</a></li>

                                    <li class="pull-right"><a href="#" class="text-muted"><i
                                                class="fa fa-gear"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="upcomming-events">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Event</th>
                                                            <th>Sold</th>
                                                            <th>Event Type</th>
                                                            <th>Gross</th>
                                                            <th>Status</th>
                                                            <th>Participants</th>

                                                        </tr>

                                                        @if (count($UpComingEvents)==0)
                                                            <tr>
                                                              <td><center>  No events found!</center></td>
                                                            </tr>
                                                        @else
                                                        @foreach ( $UpComingEvents as $UpComingEvent)
                                                        <tr>
                                                            <td>

                                                                <div class="date">
                                                                    <h4>APR 11</h4>
                                                                </div>
                                                                <img class="img-square"
                                                                    src="{{ asset($UpComingEvent->event_image) }}"
                                                                    style="width: auto; height: 86px;" alt="User Avatar">

                                                                <div class="event_details">
                                                                    <p>{{ $UpComingEvent->title }}</p>
                                                                    <p>{{ $UpComingEvent->location }}</p>
                                                                    <p>
                                                                        {{ Carbon\Carbon::parse($UpComingEvent->event_start)->toDayDateTimeString() }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p>25 / 124</p>
                                                                <p>
                                                                </p>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" style="width: 25%"
                                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <p></p>
                                                            </td>
                                                            <td>{{ $UpComingEvent->event_type }}</td>
                                                            <td>$12.00</td>
                                                            <td>
                                                                @if ($UpComingEvent->status == 1)
                                                                <i class="fa-solid fa-circle" style="color: green;"></i> Published
                                                            @elseif($UpComingEvent->status == 2)
                                                                <i class="fa-solid fa-circle" style="color: red;"></i> Draft
                                                            @elseif($UpComingEvent->status == 3)
                                                                <i class="fa-solid fa-circle" style="color: yellow;"></i> Past
                                                            @endif
                                                            </td>
                                                            <td><a href="{{ route('participants', $UpComingEvent->id)}}"><button type="button"
                                                                        class="btn btn-primary btn-sm">Show Participants</button></a></td>

                                                        </tr>
                                                        @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="past-events">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th>Event</th>
                                                            <th>Sold</th>
                                                            <th>Event Type</th>
                                                            <th>Gross</th>
                                                            <th>Status</th>
                                                            <th>Participants</th>

                                                        </tr>

                                                        @if (count($pastEvents)==0)
                                                            <tr>
                                                              <td><center>  No events found!</center></td>
                                                            </tr>
                                                        @else
                                                        @foreach ( $pastEvents as $pastEvent)
                                                        <tr>
                                                            <td>

                                                                <div class="date">
                                                                    <h4>APR 11</h4>
                                                                </div>
                                                                <img class="img-square"
                                                                    src="{{ asset($pastEvent->event_image) }}"
                                                                    style="width: auto; height: 86px;" alt="User Avatar">

                                                                <div class="event_details">
                                                                    <p>{{ $pastEvent->title }}</p>
                                                                    <p>{{ $pastEvent->location }}</p>
                                                                    <p>
                                                                        {{ Carbon\Carbon::parse($pastEvent->event_start)->toDayDateTimeString() }}</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p>25 / 124</p>
                                                                <p>
                                                                </p>
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" style="width: 25%"
                                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <p></p>
                                                            </td>
                                                            <td>{{ $pastEvent->event_type }}</td>
                                                            <td>$12.00</td>
                                                            <td>
                                                                @if ($pastEvent->status == 1)
                                                                <i class="fa-solid fa-circle" style="color: green;"></i> Published
                                                            @elseif($pastEvent->status == 2)
                                                                <i class="fa-solid fa-circle" style="color: red;"></i> Draft
                                                            @elseif($pastEvent->status == 3)
                                                                <i class="fa-solid fa-circle" style="color: yellow;"></i> Past
                                                            @endif
                                                            </td>
                                                            <td><a href="{{ route('participants', $pastEvent->id)}}"><button type="button"
                                                                        class="btn btn-primary btn-sm">Show Participants</button></a></td>

                                                        </tr>
                                                        @endforeach
                                                        @endif

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>



    </section>




@endsection
