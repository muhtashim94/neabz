@extends('layouts.admin.template')
@section('title', 'Events')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Events</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Event</th>
                                            <th>Sold</th>
                                            <th>Event Type</th>
                                            {{-- <th>Gross</th> --}}
                                            <th>Status</th>
                                            <th>Participants</th>
                                        </tr>

                                        @if (count($adminEvents) == 0)
                                            <tr>
                                                <td>
                                                    <center> No events found!</center>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($adminEvents as $adminEvent)
                                                <tr>
                                                    <td>

                                                        <img class="img-square"
                                                            src="{{ asset($adminEvent->event_image) }}"
                                                            style="width: auto; height: 86px;" alt="User Avatar">

                                                        <div class="event_details">
                                                            <p>{{ $adminEvent->title }}</p>
                                                            <p>{{ $adminEvent->location }}</p>
                                                            <p>
                                                                {{ Carbon\Carbon::parse($adminEvent->event_start)->toDayDateTimeString() }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p>{{ $adminEvent->ticketsPurchased }} /
                                                            {{ $adminEvent->available_quantity }}</p>
                                                        <p>
                                                        </p>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                style="width: {{ $adminEvent->percentage }}%"
                                                                aria-valuenow="{{ $adminEvent->ticketsPurchased }}"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <p></p>
                                                    </td>
                                                    <td>{{ $adminEvent->event_type }}</td>
                                                    {{-- <td>$12.00</td> --}}
                                                    <td>
                                                        @if ($adminEvent->status == 1)
                                                            <i class="fa-solid fa-circle" style="color: green;"></i>
                                                            Published
                                                        @elseif($adminEvent->status == 2)
                                                            <i class="fa-solid fa-circle" style="color: red;"></i> Draft
                                                        @elseif($adminEvent->status == 3)
                                                            <i class="fa-solid fa-circle" style="color: yellow;"></i> Past
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="dropdown-toggle" type="button" id="dropdownMenu1"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="true">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                                <!-- <span class="caret"></span> -->



                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                                                <li><a href="{{ route('participants', $adminEvent->id) }}">Show
                                                                        Participants</a></li>
                                                                <li><a
                                                                        href="{{ route('user_view_event', $adminEvent->id) }}">View
                                                                        Event</a></li>
                                                                <li><a
                                                                        href="{{ route('distribution', $adminEvent->id) }}">Show
                                                                        Commission</a> </li>

                                                            </ul>
                                                        </div>
                                                    </td>

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



    </section>




@endsection
