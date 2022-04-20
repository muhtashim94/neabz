@extends('layouts.event_planer.template')
@section('title', 'Edit Tickets')
@section('mainBody')

    <section class="content">

        <div class="row">
            <div class="col-md-6">

                <!-- Custom Tabs -->

                <form method="post" action="{{ route('update_tickets') }}">
                    @csrf
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <h2 class="page-header">Tickets</h2>
                            <li class="active get_ticket_type" data-ticket="paid"><a href="#paid" data-toggle="tab"
                                    aria-expanded="true">Paid</a>

                                <input type="hidden" name="ticket_type" value="{{$eventTicket->type}}" class="tclass" >
                            </li>
                            <li class="get_ticket_type" data-ticket="free"><a href="#free" data-toggle="tab"
                                    aria-expanded="false">Free</a></li>
                            <li class="get_ticket_type" data-ticket="donation"><a href="#donation" data-toggle="tab"
                                    aria-expanded="false">Donation</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="paid">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name*</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" required name="name" value="{{$eventTicket->name}}"
                                        placeholder="Ticket Name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Available Quantity*</label>
                                    <input type="number" name="available_quantity" class="form-control" value="{{$eventTicket->available_quantity}}"
                                        id="exampleInputEmail1">
                                </div>

                                <div class="form-group price">
                                    <label for="exampleInputEmail1">Price*</label>
                                    <input type="number" class="form-control" name="price" id="exampleInputEmail1" value="{{$eventTicket->price}}"
                                        placeholder="$ 0.00">
                                </div>

                                <div class="form-group">
                                    <label>When are tickets available*</label>
                                    <select class="form-control" required name="ticket_available">
                                        <option value="{{$eventTicket->ticket_available}}" >{{$eventTicket->ticket_available}}</option>
                                        <option>Date & time</option>
                                        <option>When sales end for...</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sales Start Date and time(*)</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>

                                        <input type="datetime-local" class="form-control pull-right" required value="{{$eventTicket->sales_start_date_time}}"
                                            id="reservationtime" name="sales_start_date_time">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Sales End Date and time(*)</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>

                                        <input type="datetime-local" class="form-control pull-right" required value="{{$eventTicket->sale_end_date_time}}"
                                            id="reservationtime" name="sale_end_date_time">
                                    </div>
                                </div>

                                <div class="box-footer">
                                    Advanced Settings
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description" value="{{$eventTicket->description}}"
                                        placeholder="Tell attendees more about this ticket.">{{$eventTicket->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Visibility</label>
                                    <select class="form-control" name="visibility">
                                        <option value="{{$eventTicket->visibility}}">{{$eventTicket->visibility}}</option>
                                        <option>Visible</option>
                                        <option>Hidden</option>
                                        <option>Hidden when not on sale</option>
                                        <option>Custom schedule</option>
                                    </select>
                                </div>

                                <div class="form-group maxticket">
                                    <label for="exampleInputEmail1">Max Tickets Per Order(*)</label>
                                    <input type="number" class="form-control" required name="max_ticket" value="{{$eventTicket->max_ticket}}"
                                        id="exampleInputEmail1">
                                </div>

                                <div class="form-group minticket">
                                    <label for="exampleInputEmail1">Min Tickets Per Order(*)</label>
                                    <input type="number" class="form-control" required name="min_ticket" value="{{$eventTicket->min_ticket}}"
                                        id="exampleInputEmail1">
                                </div>

                                <div class="form-group saleschannel">
                                    <label>Sales Channel</label>
                                    <select class="form-control" name="sale_channel">
                                        <option value="{{$eventTicket->sale_channel}}">{{$eventTicket->sale_channel}}</option>
                                        <option>Online Only</option>
                                    </select>
                                </div>


                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div>

                    <div class="form-group">

                        <input type="checkbox" id="eTicket" name="eTicket"  value="{{$eventTicket->eticket}}">
                        <label for="eTicket"> eTicket</label>

                    </div>
                    <div class="form-group">

                        <input type="checkbox" id="will_call" name="will_call" value="{{$eventTicket->will_call}}">
                        <label for="will_call"> Will call</label>

                    </div>

                    <input type="hidden" name="event_id" value="{{$id}}">

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </section>




@endsection

@section('custom-js')
    <script>
        $(document).ready(function() {
            $(".ticket_show").removeAttr("disabled");
        });
    </script>

    <script>
        $(document).ready(function() {

            var val = "paid";
            $('.get_ticket_type').on('click', function() {
                var val = $(this).attr('data-ticket');
                $('.tclass').val(val);
                if (val == "free") {
                    $('.price').hide();
                    $('.maxticket').show();
                    $('.minticket').show();
                    $('.saleschannel').show();
                }

               else if(val == "donation") {
                    $('.price').hide();
                    $('.maxticket').hide();
                    $('.minticket').hide();
                    $('.saleschannel').hide();
                }
                else if(val=="paid")
                {
                    $('.price').show();
                    $('.maxticket').show();
                    $('.minticket').show();
                    $('.saleschannel').show();
                }
            });



        });
    </script>
@endsection
