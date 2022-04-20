@extends('layouts.user.template')
@section('title', 'Organizer')
@section('mainBody')

    <section class="content">
        <div class="container">

        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->


                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <img id="now1" class="img-circle" src="{{asset($organizer->image)}}" style="width: auto; height: 198px;max-width:100%;" alt="User Avatar">
                                    <h1>{{$organizer->name}}</h1>
                                    <p>Hosted <b>{{$eventCounts}}</b> Events Total</p>
                                    <div class="follow-btn" id="follow-btn">
                                        <input type="hidden" name="get_organizer_id" class="get_organizer_id"
                                            value="{{ $organizer->id }}">
                                        @if ($checkFollower != null)
                                            @if ($organizer->id == $checkFollower->organizer_id)
                                                <a href="#" id="following_btn" onclick="checkFollow(1);" type="button"
                                                    class="btn btn-danger following">Un Follow</a>
                                            @endif
                                        @else
                                            <a href="#" id="follow_btn" onclick="checkFollow(0);" type="button"
                                                class="btn btn-info follow">Follow</a>
                                        @endif
                                    </div>

                                    <h5><b>{{$totalFollowers}}</b> Followers</h5>
                                    <br>
                                    <a href="#" data-toggle="modal" data-target="#contact-organizer">Contact the
                                        Organizer</a>
                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Events</h1>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab_upcomming_event" data-toggle="tab"
                                                aria-expanded="true">Upcomming (1)</a></li>
                                        <li class=""><a href="#tab_past_event" data-toggle="tab"
                                                aria-expanded="false">Past (0)</a></li>


                                        <li class="pull-right"><a href="#" class="text-muted"><i
                                                    class="fa fa-gear"></i></a></li>
                                    </ul>
                                    <div class="tab-content" style="padding: 30px;">
                                        <div class="tab-pane active" id="tab_upcomming_event">

                                            <div class="row">
                                                @if (count($UpComingEvents)==0)
                                                <h2>Sorry, there are no current events</h2>
                                                @else
                                                @foreach ($UpComingEvents as $UpComingEvent)
            <div class="col-md-4">
             <div class="event-detail">
                  <a href="{{ route('user_view_event',$UpComingEvent->id) }}">
                       <img class="img-square"src="{{ asset($UpComingEvent->event_image) }}"
                            style="width: auto; height: 196px;max-width: 100%;" alt="User Avatar">
                                                            <br>
                                                <div class="body-blog">
                                            <label for="event-name">{{$UpComingEvent->title}}</label>
                                                        </a>
                       <p class="poo12">{{ Carbon\Carbon::parse($UpComingEvent->event_start)->toDayDateTimeString() }}</p>
                                                        <p>{{$UpComingEvent->location}}</p>
                                                        <p>Starts at ${{$UpComingEvent->price}}</p>
               
                </div>
               </div>
            </div>
                                                @endforeach
                                                @endif

                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab_past_event" style="padding: 30px;">
                                            @if (count($pastEvents)==0)
                                                <h2>Sorry, there are no past events</h2>
                                                @else
                                                @foreach ($pastEvents as $pastEvent)
                                                <div class="col-md-3">
                                                    <div class="event-detail"
                                                        style="border: 1px solid #2e6da4;margin-inline-end: -23px;padding: 13px;border-radius: 9px;">
                                                        <a href="{{ route('user_view_event',$pastEvent->id)}}">
                                                            <img class="img-square"
                                                                src="{{ asset($pastEvent->event_image) }}"
                                                                style="width: auto; height: 196px;max-width: 100%;" alt="User Avatar">
                                                            <br>
                                                            <label for="event-name">{{$pastEvent->title}}</label>
                                                        </a>
                                                        <p style="color: red;">{{ Carbon\Carbon::parse($pastEvent->event_start)->toDayDateTimeString() }}</p>
                                                        <p>{{$pastEvent->location}}</p>
                                                        <p>Starts at ${{$pastEvent->price}}</p>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>

            </div>


        </div>






    <!-- Modal -->
    <div class="modal fade" id="contact-organizer" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Contact the Organizer</h4>
                </div>
                <form action="{{ route('contact_organizer') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-info">{{$errors->first()}}</div>
                        @endif

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputYourName">Your Name(*)</label>
                                    <input type="text" class="form-control" id="exampleInputYourName"
                                        placeholder="Enter Your name"  required
                                        name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Email(*)</label>
                                    <input type="email" class="form-control" id="exampleInputEmail"
                                        placeholder="Enter Email Address"  required
                                        name="email">
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contact reason(*)</label>
                                    <select class="form-control" name="contact_reason" required>
                                        <option selected disabled>Select One</option>
                                        <option value="Question about the event">Question about the event</option>
                                        <option value="Question about my ticket">Question about my ticket</option>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Message(*)</label>
                                    <textarea class="form-control" rows="10" placeholder="Message" required name="message"></textarea>
                                </div>

                            </div>
                            <input type="hidden" name="organizer" value="{{ $organizer->id }}">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


    </section>




@endsection

@section('custom-js')
    <script>
        $('#contact-organizer').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })
    </script>

    <script>
        $('#continue').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })
    </script>

    <script>
        $('#edit-question').on('shown.bs.modal', function() {
            $('#myInput').focus()
        })
    </script>
    <script>
         function checkFollow(arg = false, e) {
            var organizer_id = $('.get_organizer_id').val();

            $.ajax({
                type: 'post',
                url: '{{ URL::to('/user/check_follow') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "organizer_id": organizer_id,
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
