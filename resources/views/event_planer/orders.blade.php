@extends('layouts.event_planer.template')
@section('title', 'Event Orders')
@section('mainBody')

    <section class="content">
    <div class="container" id="org-data">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Event Orders</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
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

        </div>



    </section>




@endsection
