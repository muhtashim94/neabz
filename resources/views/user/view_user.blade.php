@extends('layouts.user.template')
@section('title', 'User')
@section('mainBody')




    <section class="content">
         <div class="container" id="view90">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    @if (isset($userProfile))
                                    <img id="avator" class="img-circle" src="{{ asset($userProfile->img) }}"
                                    style="width: auto; height: 198px;" alt="User Avatar">
                                <h1>{{$userProfile->first_name}} {{$userProfile->last_name}}</h1>
                                    @else
                                    <img class="img-circle" src="{{ asset('assets/dist/img/user1-128x128.jpg') }}"
                                    style="width: auto; height: 198px;" alt="User Avatar">
                                <h6>Please complete your profile first <a href="{{route('user_account_settings')}}">Edit Profile</a></h6>
                                    @endif

                                </center>
                            </div>
                        </div>
                        <hr class="solid">
                        <div class="container">
                        <div class="row">
                            <h3>Followers</h3>
                            @if (count($followers)==0)
                            <p>You have no followers</p>
                            @else
                            @foreach ($followers as $follower)
                            <div class="col-md-2">
                                <div class="detail">
                                    <a href="{{route('view_organizer', $follower->organizer_id)}}">
                                    <img class="img-circle" src="{{ asset($follower->getOrganizer->image) }}"
                                        style="width: auto; height: 76px; border: 2px solid #2e6da4;" alt="User Avatar"></a>
                                        <a href="{{route('view_organizer', $follower->organizer_id)}}">
                                    <label for="name">{{$follower->getOrganizer->name}}</label></a>

                                </div>
                            </div>
                            @endforeach
                            @endif


                            {{-- <div class="col-md-2">
                                <div class="detail">
                                    <br><br>
                                    <h5><a href="#" style="color: #6e6a6a;" class="show-followers">3 more...</a></h5>
                                </div>
                            </div> --}}

                        </div>

                        </div>
                        <hr class="solid">
                        <div class="container">
                        <div class="row">

                            <h3>Liked</h3>
                            @if (count($likedEvents)==0)
                                <p>No events available right now.</p>
                            @else
                            @foreach ( $likedEvents as $event)
                            <div class="col-md-4">

                                <div class="event-detail" style="width: 100%;margin-inline-end: 72px;">
                                    <a href="{{ route('user_view_event', $event->id) }}">

                                     <img class="img-square" src="{{asset($event->event_image)}}"
                                            style="width: auto; height: 198px; max-width: 100%;" alt="User Avatar"></a>
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
                                        <div class="col-md-6">
                                            {{-- <div class="follow-btn" id="follow-btn">
                                                <input type="hidden" name="get_event_id" class="get_event_id" id="get_event_id"
                                                    value="{{ $event->id }}">
                                                @if ($event->is_liked == 1)

                                                        <a href="#" id="following_btn" onclick="checkFollow(1);" type="button"
                                                            class="btn btn-danger following">Liked</a>

                                                @else
                                                    <a href="#" id="follow_btn" onclick="checkFollow(0);" type="button"
                                                        class="btn btn-info follow">Unliked</a>
                                                @endif
                                            </div> --}}
                                        </div>
                                    </div>
                                        </div>
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
    </section>
@endsection

@section('custom-js')

<script>
    $(".show-followers").click(function() {
        $(".more-followers").show();
        $(".show-followers").hide();

    });

    $(document).ready(function() {
        $(".more-followers").hide();
    });
</script>

@endsection
