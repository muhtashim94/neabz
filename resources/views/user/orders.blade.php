@extends('layouts.user.template')
@section('title', 'Orders')
@section('mainBody')

    <section class="content">
        <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Event Name</th>
                                            <th>Tickets</th>
                                            <th>Ticket Type</th>
                                            <th>Payment Status</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                        </tr>
                                        @if (count($orderTickets)==0)
                                       <td colspan="7"><center> No orders found!</center></td>
                                        @else
                                        @foreach ( $orderTickets as $orderTicket)
                                        <tr>
                                            <td>{{$orderTicket->order_id}}</td>
                                            <td>{{$orderTicket->getEvent->title}}</td>
                                            <td><i class="fa-solid fa-ticket"></i> {{$orderTicket->no_of_tickets}}</td>
                                            <td>{{$orderTicket->getEventTicket->type}}</td>
                                            <td>{{$orderTicket->payment_status}}</td>
                                            <td>${{number_format($orderTicket->ticket_price)}}</td>
                                            <td>${{number_format($orderTicket->ticket_price)}}</td>
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
