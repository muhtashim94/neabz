@extends('layouts.event_planer.template')
@section('title', 'Event Dashboard')
@section('mainBody')

    <section class="content">
        <div class="container" id="evt-desh">
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">

                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="box-title">Event Dashboard</h3>

                            </div>
                            <div class="col-md-6" id="sear12">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Find Attendees">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                                class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-header -->


                        <div class="box-body">
                            <hr class="solid">

                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-3">

                                    <div class="event-detail">
                                        <h3>Net sales</h3>
                                        <h3>${{$totalRevenue}}</h3>
                                    </div>

                                </div>

                                <div class="col-md-3 cent">
                                    <div class="event-detail">
                                        <h4>{{$ticketsPurchased}} Tickets Sold / {{$ticket->available_quantity}}</h4>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{$percentage}}%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-3">

                                    <div class="event-detail">
                                        <h3>Gross sales</h3>
                                        <h3>${{$totalRevenue}}</h3>
                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="event-detail">
                                        <article>
                                            <p>You're collecting payments with:</p>
                                            <h4>
                                                Neabz Payment Processing


                                                <a id="edit_payment_processor" class="js-tracked link-aside" href="#"
                                                    data-label="edit"></a>
                                            </h4>


                                            <div id="payment_method_logos" class="clrfix">
                                                <img src="{{ asset('assets\images\eventImages\R.png') }}" height="52"
                                                    width="122">

                                            </div>

                                        </article>
                                    </div>
                                </div>


                            </div>


                            <br>

                            <hr class="solid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Ticket Info</h3>
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Ticket Name</th>
                                            <th>Ticket Type</th>
                                            <th>Price</th>
                                            <th>Sold</th>
                                            <th>Status</th>
                                            <th>End Sales</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p> {{$ticket->name}} </p>
                                            </td>
                                            <td>
                                                <p> {{$ticket->type}} </p>
                                            </td>
                                            <td>
                                                <p> ${{$ticket->price}} </p>
                                            </td>
                                            <td>
                                                <p> {{$ticketsPurchased}}/{{$ticket->available_quantity}} </p>
                                            </td>
                                            <td>
                                                <p>{{$ticket->status ? "On Sale":"Sale off"}}</p>
                                            </td>
                                            <td>
                                                <p>{{ Carbon\Carbon::parse($ticket->sale_end_date_time)->toDayDateTimeString() }}</p>
                                            </td>

                                        </tr>


                                    </table>
                                </div>
                            </div>
                            <hr class="solid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Common Reports</h3>
                                    <div class="reports">
                                        <a href="{{ route('sales_report') }}" class="btn btn-default">
                                            <label for="sales-report">Sales Report</label>
                                            <p>Information about attendees</p>
                                        </a>
                                    </div>

                                </div>
                            </div>

                            <hr class="solid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Recent Orders</h3>
                                    <div class="orders">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table  class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>Event Name</th>
                                                            <th>User Name</th>
                                                            <th>User Email</th>
                                                            <th>Tickets</th>
                                                            <th>Ticket Type</th>
                                                            <th>Payment Status</th>
                                                            <th>Subtotal</th>
                                                            <th>Total</th>
                                                        </tr>
                                                        @if (count($eventOrders)==0)
                                                        <td colspan="7"><center>No orders found!</center></td>
                                                        @else
                                                        @foreach ( $eventOrders as $eventOrder)
                                                        <tr>
                                                            <td>{{$eventOrder->order_id}}</td>
                                                            <td>{{$eventOrder->getEvent->title}}</td>
                                                            <td>{{$eventOrder->first_name}} {{$eventOrder->last_name}}</td>
                                                            <td>{{$eventOrder->email}}</td>
                                                            <td><i class="fa-solid fa-ticket"></i> {{$eventOrder->no_of_tickets}}</td>
                                                            <td>{{$eventOrder->getEventTicket->type}}</td>
                                                            <td>{{$eventOrder->payment_status}}</td>
                                                            <td>${{number_format($eventOrder->ticket_price)}}</td>
                                                            <td>${{number_format($eventOrder->ticket_price)}}</td>
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

                        <hr class="solid">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Your Links</h3>
                                <label for="">Your Organizer URL: <a target="_blank" href="{{route('view_organizer', $event->organizer_id)}}">http://localhost:8000/user/view_organizer/{{$event->organizer_id}}</a>
                                </label>
                                {{-- [<a role="button" data-toggle="collapse" href="#changeorganizerurl" aria-expanded="false" aria-controls="changeorganizerurl">change</a> ] --}}
                                <div class="collapse" id="changeorganizerurl">
                                    <div class="well">
                                        <p>Create your own Personalized Organizer URL for abc</p>
                                        <div class="btn-group">
                                            http://<input name="orgshortname" id="orgshortname" maxlength="50" type="text"
                                                style="width: 200px;" value="None">.neabz.com

                                        </div>
                                        <button type="button" class="btn btn-warning">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="solid">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Your Event URL</h3>
                                <input type="text" class="form-control" style="position: absolute;" id="event-url"
                                    value="http://localhost:8000/user/view_event/{{$event->id}}" readonly>
                                <i class="fa-solid fa-copy copied" style="position: relative;float: right;top: 8px;"></i>
                            </div>

                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="collapse" id="changeeventrurl" style="margin-top: 30px;">
                                    <div class="well">

                                        <div class="btn-group">
                                            http://<input name="orgshortname" id="orgshortname" maxlength="50" type="text"
                                                style="width: 200px;">.neabz.com

                                        </div>
                                        <button type="button" class="btn btn-warning">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>

            </div>

        </div>


    </section>




@endsection

@section('custom-js')
    <script>
        $(".copied").click(function() {
            /* Get the text field */
            var copyText = document.getElementById("event-url");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

        });
    </script>

@endsection
