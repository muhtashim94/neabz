@extends('layouts.event_planer.template')
@section('title', 'Events')
@section('mainBody')

    <section class="content">
    <div class="container" id="event1">

        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i style="font-size:30px;margin-right:10px;" class="fas fa-tasks icoo" aria-hidden="true"></i>Events</h3>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="input-group">
                            <label>Search</label>
                                <input type="text" id="search" name="search" class="form-control" placeholder="Search...">
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
                                <select class="form-control" name="status" id="status">
                                    <option value="">All</option>
                                    <option value="1">Published</option>
                                    <option value="2">Draft</option>
                                    <option value="3">Past</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Organizer</label>
                                <select class="form-control" name="organizer" id="organizer">
                                    <option selected value="">Select Organizer</option>
                                    @foreach ($organizers as $organizer)
                                        <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <tr class="tab00">
                                    <th>Event</th>
                                    <th>Sold</th>
                                    <th>Gross</th>
                                    <th>Status</th>
                                    <th> </th>
                                </tr>

                                <tbody class="search-table">
                                  @if (count($events)==0)
                                    <td colspan="5"><center>No events found!</center></td colspan="5">
                                  @else
                                  @foreach ($events as $event)
                                  <tr>
                                      <td>
                                          <img class="img-square" src="{{ asset($event->event_image) }}"
                                              style="width: auto; height: 86px;" alt="User Avatar">
                                                <div class="event_details">
                                                    <h4><b>{{ $event->title }}<b></h4>
                                                    <p>{{ $event->location }}</p>
                                                    <h6><time>{{ Carbon\Carbon::parse($event->event_start)->toDayDateTimeString() }}</time>
                                                    </h6>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="pro12">25 / 124</p>
                                                <p>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>


                                                </p>
                                            </td>
                                            <td>$12.00</td>
                                            <td>
                                                @if ($event->status == 1)
                                                    <i class="fa-solid fa-circle" style="color: green;"></i> Published
                                                @elseif($event->status == 2)
                                                    <i class="fa-solid fa-circle" style="color: red;"></i> Draft
                                                @elseif($event->status == 3)
                                                    <i class="fa-solid fa-circle" style="color: yellow;"></i> Past
                                                @endif

                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="dropdown-toggle" type="button"
                                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="true">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        <!-- <span class="caret"></span> -->



                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                                  <li><a href="{{ route('event_dashboard', $event->id) }}">Dashboard</a></li>
                                                  <li><a href="{{ route('user_view_event', $event->id) }}">View</a></li>
                                                  <li><a
                                                          href="{{ route('edit_create_event', $event->id) }}">Edit</a>
                                                  </li>

                                                  {{-- {{-- <li><a href="#">Copy URL</a></li> --}}
                                                  <li role="separator" class="divider"></li>

                                                  <li><a href="{{ url('/events/postpone') }}">Postpone</a></li>
                                                  {{-- <li><a href="{{ url('/events/copy_event') }}">Copy Event</a></li> --}}
                                                  {{-- <li><a href="{{ url('/events/postpone') }}">Postpone</a></li> --}}
                                              </ul>
                                          </div>
                                      </td>

                                  </tr>
                              @endforeach
                                  @endif
                                </tbody>


                            </table>
                            <div class="csv-export">
                                &nbsp; &nbsp;<a href="#"><i class="fa-solid fa-download"></i> CSV Export</a>
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
    <script type="text/javascript">
        $(document).ready(function() {

            var data = {};
            function fetch_data(data)
            {
                console.log(data)
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('/events/search') }}',
                    data: data,
                    success: function(data) {
                        console.log(data);
                        $('.search-table').html(data);
                    }
                });
            }
            $('#search').on('keyup', function() {
                $value = $(this).val();
                data['search'] = $value
                fetch_data(data)
            })

            $('#status').on('change', function(e) {
                var statusValue = $(this).val();
                data['status'] =  statusValue

                fetch_data(data)

            });

            $('#organizer').on('change', function(e) {
                var organizerValue = $(this).val();
                data['organizer'] =  organizerValue
                fetch_data(data)

            });
            console.log(data)
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>

@endsection
