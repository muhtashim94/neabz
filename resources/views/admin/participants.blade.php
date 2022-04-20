@extends('layouts.admin.template')
@section('title', 'Participants')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Participants</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Event Name</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Total Tickets</th>
                                            <th>Subtotal</th>
                                            <th>Total</th>
                                        </tr>
                                            @if (count($showEventTickets)==0)
                                                No participants found!
                                            @else

                                            @foreach ( $showEventTickets as $showEventTicket )
                                            <tr>
                                                <td>{{$showEventTicket->order_id}}</td>
                                                <td>{{$showEventTicket->first_name}} {{$showEventTicket->last_name}}</td>
                                                <td>{{$showEventTicket->email}}</td>
                                                <td>{{$showEventTicket->getEvent->title}}</td>
                                                <td>PayPal</td>
                                                <td>{{$showEventTicket->payment_status}}</td>
                                                <td><i class="fa-solid fa-ticket"></i> {{$showEventTicket->no_of_tickets}}</td>
                                                <td>${{number_format($showEventTicket->ticket_price)}}</td>
                                                <td>${{number_format($showEventTicket->ticket_price)}}</td>
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
