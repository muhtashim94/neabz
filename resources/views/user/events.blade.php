@extends('layouts.user.template')

@section('custom-css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc !important;
            border-radius: 0px !important;
        }
        .event-detail {
    height: 400px;
    background-color: #f1f1f1;
}

.body-blog {
    margin-top: 25px;
    padding-left: 5%;
    padding-right: 5%;
}

.body-blog label {
    color: #FF470F;
}

p.poo {
    font-size: 12px;
    height: 40px;
}
p.poo12 {
    font-size: 8px;
    color: black!important;
}
.body-blog label {
    color: #FF470F;
}

.body-blog {
    text-align: center;
}

.bg-light {
    background-color: #f8f9fa!important;
}



    </style>
@endsection
@section('mainBody')



    <section class="content">

        <div class="container">
        <div class="row">

            <div class="col-md-12">

            <section class="playbook-sec pb-5">
        <div class="container">
            <div class="row bg-light pt-3 pb-3 shadow">
                <div class="col-md-2 col-sm-2 col-xs-12">
                    <div class="icon">
                        <i aria-hidden="true" class="fa fa-exclamation"></i>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-12">
                    <div class="playbook-text">
                    <h4>Re-open confidently with Neabz COVID-19 Safety Playbook</h4>
                        <p>We partnered with risk management and health experts to empower event creators to thoughtfully consider potential safety and security risks at your event.
                            <a href="#"></a>See the playbook.
                        </p>
                    </div>
                </div>
            </div>
                <div class="row mt-5" id="about-us">
                    <div class="col-md-12">
                        <div class="aboutdiv wow fadeInUp" data-wow-duration="1000ms">
                            <h2>About Neabz</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem
                                ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.</p>
                        </div>
                    </div>
                </div>
        </div>
    </section>


                <!-- general form elements -->
                <div class="container">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Events</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Location</label>
                                <select class="form-control select2">
                                    <option selected>Use my current location</option>
                                </select>
                            </div>
                          <!--   <div class="col-md-4">
                                <label for="event_name">Event Name</label>
                                <div class="input-group">
                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search"  class="btn btn-flat"><i
                                                class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                            </div> -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ticket Type</label>
                                    <select class="form-control" id="ticket">
                                        <option value="">Select Ticket Type</option>
                                        <option value="paid">Paid</option>
                                        <option value="free">Free</option>
                                        <option value="donation">Donation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Organizer</label>
                                    <select class="form-control" id="organizer">
                                        <option selected disabled>Select Organizer</option>
                                        @foreach ($organizers as $organizer)
                                            <option value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>



                        <div class="row search-table">

                        <h2 class="text-center">Upcoming Events</h2>
                            @if (count($events)==0)
                                <p>No events available right now.</p>
                            @else
                            @foreach ( $events as $event)
                            <div class="col-md-4">

                                <div class="event-detail"
                                    style="width: 100%;margin-inline-end: 72px;">
                                    <a href="{{ route('user_view_event', $event->id) }}">

                                        <img class="img-square" src="{{asset($event->event_image)}}"
                                            style="width:100%; height: 198px; max-width: 100%;" alt="User Avatar"></a>
                                        <br>
                                        <div class="body-blog">

                                        <a href="{{ route('user_view_event', $event->id) }}">
                                        <label for="event-name">{{$event->title}}</label></a>

                                    <p class="poo12" style="color: red;">{{ Carbon\Carbon::parse($event->event_start)->toDayDateTimeString() }}</p>
                                    <p class="poo">{{$event->location}}</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="date2">Starts at ${{$event->price}}</p>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="follow-btn" id="follow-btn">
                                                <input type="hidden" name="get_event_id" class="get_event_id" id="get_event_id"
                                                    value="{{ $event->id }}">
                                                @if ($event->is_liked == 1)

                                                        <a href="#" id="following_btn" onclick="checkFollow(1);" type="button"
                                                            class="btn btn-danger following btn-xs">Liked</a>

                                                @else
                                                    <a href="#" id="follow_btn" onclick="checkFollow(0);" type="button"
                                                        class="btn btn-default follow btn-xs">Unliked</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>

                            @endforeach

                            @endif

                        </div>

                        <center>
                            {{ $events ->links() }}
                        </center>
                    </div>
                </div>
                </div>

            </div>
        </div>

        </div>
    </section>



    <section class="contactsec py-5">
        <div class="container">
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
            <div class="row">

            
                <div class="col-md-12">
                    <div class="contactform">
                        <form action="" class="contact-form" id="form09">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block">
                                
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block">
                                        
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-block">
                                       
                                        <input type="phone" class="form-control" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-block">
                                       
                                        <input type="text" class="form-control"  placeholder="I am Interested In">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-block textarea">
                                     
                                        <textarea rows="3" type="text" class="form-control placeholder="Leave your message here"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12 col-12">
                                <button class="square-button">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>



@endsection

@section('custom-js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>
<script type="text/javascript">
    $(document).ready(function() {

        var data = {};
        function fetch_data(data)
        {
            console.log(data)
            $.ajax({
                type: 'get',
                url: '{{ URL::to('users/events/search') }}',
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

        $('#ticket').on('change', function(e) {
            var ticketValue = $(this).val();
            data['ticket'] =  ticketValue
            
            fetch_data(data)

        });

        $('#organizer').on('change', function(e) {
            var organizerValue = $(this).val();
            data['organizer'] =  organizerValue
            fetch_data(data)

        });

    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

<script>
       function checkFollow(arg = false, e) {
            var event_id = $('.get_event_id').val();

            $.ajax({
                type: 'post',
                url: '{{ URL::to('/user/check_liked') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "event_id": event_id,
                    "arg": arg,
                },
                success: function(data) {
                    // if(arg){
                    //     $("#following_btn").show();
                    //     $("#follow_btn").hide();
                    // }
                    // else{
                    //     $("#following_btn").show();
                    //     $("#follow_btn").hide();

                    // }
                    // $("#follow-btn").load("#follow-btn");
                    $("#follow-btn").load(window.location.href + " #follow-btn");
                }
            });

        }
</script>



@endsection

