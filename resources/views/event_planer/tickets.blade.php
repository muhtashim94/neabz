@extends('layouts.event_planer.template')
@section('title', 'Tickets')
@section('mainBody')

    <section class="content">
    <div class="container" id="ticket">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tickets</h3>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <tr>
                                    <th>Ticket Type</th>
                                    <th>Sold</th>
                                    <th>Gross</th>
                                    <th>Status</th>
                                    <th> </th>
                                </tr>
                                <tr>
                                    <td>

                                        <div class="ticket-details">
                                            <h4>General Ticket</h4>
                                            <p><i class="fa-solid fa-circle" style="color: green;"></i> On Sale . Ends April
                                                11, 2022 at 7:00 PM</p>

                                        </div>
                                    </td>
                                    <td>
                                        <p>25 / 124</p>
                                        <p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 25%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        </p>
                                    </td>
                                    <td>$12.00</td>
                                    <td><i class="fa-solid fa-circle" style="color: green;"></i> On Sale . Ends April 11,
                                        2022 at 7:00 PM</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenu1"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                                <li><a href="{{ url('/events/create_tickets') }}">Edit</a></li>
                                                <li><a href="#">Delete</a></li>

                                            </ul>
                                        </div>
                                    </td>

                                </tr>


                            </table>
                        </div>

                    </div>


                </div>

            </div>

        </div>
        </div>

    </section>




@endsection
