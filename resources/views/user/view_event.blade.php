@extends('layouts.user.template')
@section('title', 'Event Page')
@section('mainBody')
<section class="content">
 <div class="container">

   <div class="row">
      <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Event Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-8">
                           <img class="img-square" src="{{ asset($event->event_image) }}" style="width: 500px"
                              alt="User Avatar">
                        </div>
                        <div class="col-md-4">
                           <h3>{{ Carbon\Carbon::parse($event['getEventDateNTime']->event_start)->toDayDateTimeString() }}
                           </h3>
                           <br>
                           <h4>{{ $event->title }}</h4>
                           <input type="hidden" class="event_id" name="event_id"
                              value={{ $event->id }}>
                           by <a
                              href="{{ route('view_organizer', $event->organizer_id) }}">{{ $event->getOrganizer->name }}</a>
                           <div class="follow-btn" id="follow-btn">
                              <input type="hidden" name="get_organizer_id" class="get_organizer_id"
                                 value="{{ $event->organizer_id }}">
                              @if ($checkFollower != null)
                              @if ($event->organizer_id == $checkFollower->organizer_id)
                              <a href="#" id="following_btn" onclick="checkFollow(1);" type="button"
                                 class="btn btn-success following">Un Follow</a>
                              @endif
                              @else
                              <a href="#" id="follow_btn" onclick="checkFollow(0);" type="button"
                                 class="btn btn-info follow">Follow</a>
                              @endif
                           </div>
                           <div class="display-price">
                              <h4> ${{ $event['getEventTickets']->price }}</h4>
                           </div>
                           <button type="button" class="btn btn-primary" data-toggle="modal"
                              data-target="#ticket">Tickets</button>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-8">
                           <h4>Event Summary</h4>
                           <p>{{ $event->event_summary }}</p>
                           <h4>Event Detail</h4>
                           <div>
                              {!! $event->event_details !!}
                           </div>
                           <br>
                           <br>
                           <h4>Tags</h4>
                           @foreach ($event['eventTags'] as $tag)
                           <a class="btn btn-default" role="button">{{ $tag->getEventTag->name }}</a>
                           @endforeach
                           {{-- <h4>Share with friends</h4>
                           <ul>
                              <li><i class="fa-brands fa-facebook"></i></li>
                              <li><i class="fa-brands fa-facebook-messenger"></i></li>
                              <li><i class="fa-brands fa-linkedin"></i></li>
                              <li><i class="fa-brands fa-twitter"></i></li>
                              <li><i class="fa-solid fa-envelope"></i></li>
                           </ul> --}}
                        </div>
                        <div class="col-md-4">
                           <h4>Date and time</h4>
                           <p>{{ Carbon\Carbon::parse($event['getEventDateNTime']->event_start)->toDayDateTimeString() }}
                           </p>
                           <p>{{ Carbon\Carbon::parse($event['getEventDateNTime']->start_time)->format('h:i a') }}
                              -
                              {{ Carbon\Carbon::parse($event['getEventDateNTime']->end_time)->format('h:i a') }}
                           </p>
                           <h4>Location</h4>
                           <p>{{ $event->location }}</p>

                        </div>
                     </div>
                     <div class="row">
                        <h3>Interest Suggestions</h3>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                           <!-- Indicators -->
                           <ol class="carousel-indicators">
                              <li data-target="#carousel-example-generic" data-slide-to="0"
                                 class="active">
                              </li>
                              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                           </ol>
                           <!-- Wrapper for slides -->
                           <div class="carousel-inner" role="listbox">
                              <div class="item active">
                                 @foreach ($SuggestedEvents as $SuggestedEvent)
                                 <div class="col-md-3">
                                    <div class="event-detail"
                                       style="border: 2px solid #2e6da4;margin-inline-end: -3px;padding: 8px;border-radius: 9px;">
                                       <a href="{{ route('user_view_event', $SuggestedEvent->id) }}">
                                       <img class="img-square"
                                          src="{{ asset($SuggestedEvent->event_image) }}"
                                          style="width: auto; height: 198px; max-width: 100%;"
                                          alt="User Avatar">
                                       <br>
                                       <label
                                          for="event-name">{{ $SuggestedEvent->title }}</label>
                                       </a>
                                       <p style="color: red;">
                                          {{ Carbon\Carbon::parse($SuggestedEvent->event_start)->toDayDateTimeString() }}
                                       </p>
                                       <p>{{ $SuggestedEvent->location }}</p>
                                       <p>${{ $SuggestedEvent->price }}</p>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                           <!-- Controls -->
                           <a class="left carousel-control" href="#carousel-example-generic" role="button"
                              data-slide="prev">
                           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                           <span class="sr-only">Previous</span>
                           </a>
                           <a class="right carousel-control" href="#carousel-example-generic" role="button"
                              data-slide="next">
                           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                           <span class="sr-only">Next</span>
                           </a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <center>
                              <h2> <a
                                 href="{{ route('view_organizer', $event->organizer_id) }}">{{ $event->getOrganizer->name }}</a>
                              </h2>
                              <p>Organizer of {{ $event->title }}</p>
                              <button type="button" class="btn btn-info" data-toggle="modal"
                                 data-target="#contact-organizer">Contact</button>
                           </center>
                           <br>
                           <br>
                           {{-- <iframe
                              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14483.696062680268!2d67.072054!3d24.832272!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc784feb6c110af2f!2sOssols%20Pvt%20Ltd!5e0!3m2!1sen!2s!4v1646671904751!5m2!1sen!2s"
                              width="1140" height="450" style="border:0;" allowfullscreen=""
                              loading="lazy"></iframe> --}}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<!-- Modal -->
<div class="modal fade" id="ticket" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{ $event->title }}</h4>
         </div>
         <div class="modal-body">
            <p>{{ Carbon\Carbon::parse($event['getEventDateNTime']->event_start)->toDayDateTimeString() }}</p>
            <div class="row">
               <div class="col-md-8">
                  <h4>No of Tickets:</h4>
                  <h3>{{ $event['getEventTickets']->price }}</h3>
                  <p>Sales end on
                     {{ Carbon\Carbon::parse($event['getEventTickets']->sale_end_date_time)->toDayDateTimeString() }}
                  </p>
               </div>
               <div class="col-md-4">
                  <div class="form-group">
                     <select class="form-control ticketsNo" id="getticketno" required name="ticketsNo">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                     </select>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right" data-dismiss="modal" data-toggle="modal"
               data-target="#ticketinvoice">Get Tickets</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="ticketinvoice" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{ $event->title }}</h4>
         </div>
         <div class="modal-body">
            <center>
               {{--
               <p>Time left 19:20</p>
               --}}
            </center>
            <div class="row">
               <div class="col-md-6">
               </div>
               <div class="col-md-6">
                  <label>Your Tickets</label>
                  <table class="table  table-bordered">
                     <tr>
                        <th>Ticket Name</th>
                        <th>Ticket Type</th>
                        <th>No of Tickets</th>
                     </tr>
                     <tr>
                        <td>{{ $event['getEventTickets']->name }}</td>
                        <td>{{ $event['getEventTickets']->type }}</td>
                        <td id="totalTicketsNo"></td>
                     </tr>
                  </table>
                  <label>Order summary</label>
                  <table class="table  table-bordered">
                     <tr>
                        <th>Tickets</th>
                        <th>SEAT</th>
                     </tr>
                     <tr>
                        <td><span id="total_Tickets_No"></span> x {{ $event['getEventTickets']->name }}
                           ${{ $event['getEventTickets']->price }} each
                           <input type="hidden" name="unitPrice" class="unitPrice"
                              value="{{ $event['getEventTickets']->price }}">
                        </td>
                        <td id="totalPrice"></td>
                     </tr>
                  </table>
                  <table style="width:100%">
                     <tr>
                        <th>Subtotal:</th>
                        <td id="total_Price"></td>
                     </tr>
                     <tr>
                        <th>Fees:</th>
                        <td>$0.00</td>
                     </tr>
                     <tr>
                        <th>Delivery
                           eTickets:
                        </th>
                        <td>$0.00</td>
                     </tr>
                     <tr>
                        <th>Total</th>
                        <td id="final_total">USD $52.08</td>
                     </tr>
                  </table>
               </div>
               <div class="col-md-12">
                  <button type="submit" class="btn btn-info" data-dismiss="modal" data-toggle="modal"
                     data-target="#ticket">Edit Ticket</button>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right" data-dismiss="modal" data-dismiss="modal"
               data-toggle="modal" data-target="#checkout">Checkout</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="checkout" style="overflow-y: scroll;" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Checkout</h4>
         </div>
         <div class="modal-body">
            <center>
               {{--
               <p>Time left 19:20</p>
               --}}
            </center>
            <center>
               <p>By clicking "Place Order", I accept the Terms of Service and have read the Privacy Policy. I
                  agree that Eventbrite may share my information with the event organizer.
               </p>
            </center>
            <div class="row">
               <div class="col-md-12">
                  <h2>Contact information</h2>
                  {{--
                  <p>Logged in as kertihekke@vusra.com. Not you?</p>
                  --}}
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputFirstName">First name</label>
                           <input type="text" class="form-control" id="first_name"
                              placeholder="Enter First name"

                              value="{{ $userAccountSettings ? $userAccountSettings->first_name : "" }}">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputlastName">Last name</label>
                           <input type="text" class="form-control" id="last_name"
                              placeholder="Enter Last name" value="{{ $userAccountSettings ? $userAccountSettings->last_name : ""}}">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <input class="form-control" disabled="" name="buyer_email" type="email" id="email"
                           value="{{ Auth::user()->email }}">
                        <h2>Payment method</h2>
                        <div class="form-group">
                           <div class="radio">
                              {{-- <label>
                              <input type="radio" class="pay-by-card" name="optionsRadios"
                                 id="optionsRadios1" value="option1" checked="">
                              Credit or debit card
                              </label> --}}
                              {{-- <div class="row card-info">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="exampleInputCardNumber">Card Number</label>
                                       <input type="text" class="form-control"
                                          id="exampleInputCardNumber" placeholder="e.g. 1111222233334444">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputExpirationDate">Expiration Date</label>
                                       <input type="text" class="form-control"
                                          id="exampleInputExpirationDate" placeholder="MM/YY">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputCSC">CSC</label>
                                       <input type="text" class="form-control" id="exampleInputCSC">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label for="exampleInputPostal">Zip/Postal</label>
                                       <input type="text" class="form-control" id="exampleInputPostal">
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input type="checkbox" id="save" name="save">
                                       <label for="save">Save payment details to your Neabz account
                                       (optional)</label><br>
                                    </div>
                                 </div>
                              </div> --}}
                           </div>
                           <div class="radio">
                              <label>
                              <input type="radio" class="pay-by-paypal" name="optionsRadios"
                                 id="optionsRadios2" value="option2">
                              Sign into your PayPal account to complete your purchase.
                              </label>
                              <div class="row paypal">
                                 <div class="col-md-6">
                                    {{-- <button type="button" class="btn btn-primary">PayPal</button> --}}
                                    <div id="paypal-button-container" style="margin-top: 20px;"></div>
                                 </div>
                                 {{--
                                 <div class="col-md-6">
                                    <button type="button" class="btn btn-primary">Pay Later</button>
                                 </div>
                                 --}}
                              </div>
                           </div>
                        </div>
                        {{--
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="checkbox" id="keep_update" name="keep_update" checked>
                              <label for="keep_update">Keep me updated on the latest news, events, and
                              exclusive offers from this event organizer.</label><br>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <input type="checkbox" id="notify_email" name="notify_email" checked>
                              <label for="notify_email">Neabz can send me emails about the best events
                              happening nearby.</label><br>
                           </div>
                        </div>
                        --}}
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <button type="submit" class="btn btn-info" data-dismiss="modal" data-toggle="modal"
                     data-target="#ticket">Edit Ticket</button>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-info pull-right" data-dismiss="modal">Submit</button>
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
               <div class="alert alert-info">{{ $errors->first() }}</div>
               @endif
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputYourName">Your Name(*)</label>
                        <input type="text" class="form-control" id="exampleInputYourName"
                           placeholder="Enter Your name" required name="name">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputEmail">Email(*)</label>
                        <input type="email" class="form-control" id="exampleInputEmail"
                           placeholder="Enter Email Address" required name="email">
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
                  <input type="hidden" name="organizer" value="{{ $event->organizer_id }}">
                  <input type="hidden" name="organizer_commission" class="organizer_commission" value="{{ $event->getOrganizer->distribution }}">
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
@endsection
@section('custom-js')
<script>
   $('#ticket').on('shown.bs.modal', function() {
       $('#myInput').focus()
   });

   $('#ticketinvoice').on('shown.bs.modal', function() {
       $('#myInput').focus()
   });

   $('#checkout').on('shown.bs.modal', function() {
       $('#myInput').focus()
   });

   $('#contact-organizer').on('shown.bs.modal', function() {
       $('#myInput').focus()
   });

   $('#continue').on('shown.bs.modal', function() {
       $('#myInput').focus()
   });

   $('#edit-question').on('shown.bs.modal', function() {
       $('#myInput').focus()
   });
</script>
<script>
   $(".pay-by-card").click(function() {
       $(".card-info").show();
   });
   $(".pay-by-paypal").click(function() {
       $(".paypal").show();
   });

   $(".pay-by-card").click(function() {
       $(".paypal").hide();
   });

   $(".pay-by-paypal").click(function() {
       $(".card-info").hide();
   });

   $(document).ready(function() {
       $(".card-info").show();
       $(".paypal").hide();

   });

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
               $("#follow-btn").load(window.location.href + " #follow-btn");
           }
       });
   }

   $('.ticketsNo').click(function() {
       var tickets = $('.ticketsNo').val();
       var unitPrice = $('.unitPrice').val();
       var totalPrice = tickets * unitPrice;
       $('#totalPrice').text('$' + totalPrice);
       $('#total_Price').text('$' + totalPrice);
       $('#final_total').text('$' + totalPrice);
       $('#totalTicketsNo').text(tickets);
       $('#total_Tickets_No').text(tickets);
       $("#take_Tickets_No").val(tickets);



   });
</script>
<script
   src="https://www.paypal.com/sdk/js?client-id=AWZC2MUp8Fn_DNy5ZxUsHXpwpZIjkv78BkKRiR4cR_vuWqlutr6Uueo6hGY-AzuxLjMHtzRIrGSVNLMn&disable-funding=venmo&currency=USD&intent=capture"
   data-sdk-integration-source="button-factory"></script>
<script>
   var status= "";
   var total = "";
   var tickets = "";
   var unitPrice = "";
   unitPrice = $('.unitPrice').val();
   $('.ticketsNo').on('change', function() {
       tickets = $('.ticketsNo').val();
       total = tickets * unitPrice;

   });

   function createInvoice(data) {
     var commission = $('.organizer_commission').val();
       var event_id = $('.event_id').val();
       var event_id = $('.event_id').val();
       var first_name = $('#first_name').val();
       var last_name = $('#last_name').val();
       var email = $('#email').val();
       $.ajax({
           method: "POST",
           url: "{{ URL::to('/create/invoice') }}",

           data: {
               "_token": "{{ csrf_token() }}",
               'total': total,
               'tickets': tickets,
               'event_id': event_id,
               'unitPrice': unitPrice,
               'first_name': first_name,
               'last_name': last_name,
               'email': email,
               'status': status,
               'commission': commission,
           },
           success: function(data) {
               console.log(data);
           },
           error: function(error) {
               console.log(error);
           }
       });
   }

   function initPayPalButton() {
       paypal.Buttons({
           style: {
               shape: 'pill',
               color: 'white',
               layout: 'vertical',
               label: 'paypal',
           },
           createOrder: function(data, actions) {
            // createInvoice(data)
               return actions.order.create({
                   purchase_units: [{
                       "amount": {
                           "currency_code": "USD",
                           "value": (total) ? total : 0,
                       }
                   }]
               });
           },

           onApprove: function(data, actions) {
               return actions.order.capture().then(function(orderData) {

                   // Full available details
                   console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                   status= orderData['status'];
                   // Show a success message within this page, e.g.
                   const element = document.getElementById('paypal-button-container');
                   element.innerHTML = '';
                   element.innerHTML = '<h3>Thank you for your payment!</h3>';
                   createInvoice(data)
                   // Or go to another URL:  actions.redirect('thank_you.html');

               });
           },

           onError: function(err) {
               console.log(err);
           }
       }).render('#paypal-button-container');
   }
   initPayPalButton();
</script>
@endsection
