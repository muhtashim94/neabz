@extends('layouts.event_planer.template')
@section('title', 'Dashboard')
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
                                <h3 class="box-title">Dashboard</h3>

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
                                    <h3>Total Events</h3>
                                    <h3>{{$totalEvents}}</h3>
                                </div>

                            </div>
                            <div class="col-md-3">
                            <div class="event-detail">
                                    <h3>Past Events</h3>
                                    <h3>{{$pastEvents}}</h3>
                                </div>
                            </div>
                            <div class="col-md-3 cent">
                                <div class="event-detail">
                                    <h3>Current Events</h3>
                                    <h3>{{$UpComingEvents}}</h3>
                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="event-detail">
                                    <h3>Total Orders</h3>
                                    <h3>{{$totalOrders}}</h3>
                                </div>
                            </div>
                        </div>


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

                                    @if (count($tickets)==0)
                                        No, tickets found of any events.
                                    @else
                                    @foreach ( $tickets as $ticket)
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
                                            <p> {{$ticket->ticketsPurchased}}/{{$ticket->available_quantity}} </p>
                                        </td>
                                        <td>
                                            <p>{{$ticket->status ? "On Sale":"Sale off"}}</p>
                                        </td>
                                        <td>
                                            <p>{{ Carbon\Carbon::parse($ticket->sale_end_date_time)->toDayDateTimeString() }}</p>
                                        </td>

                                    </tr>
                                    @endforeach

                                    @endif



                                </table>
                            </div>
                        </div>


                        <hr class="solid">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Recent Orders</h3>
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
