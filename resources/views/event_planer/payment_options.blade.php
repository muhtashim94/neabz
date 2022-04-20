@extends('layouts.event_planer.template')
@section('title', 'Payment Options')
@section('mainBody')

    <section class="content">

    <div class="container" id="payment-option">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Payment Options</h3>
                        <p>Manage how your attendees can pay you.</p>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-12">
                                <h2>Country & currency</h2>
                                <p>Choose the country & currency you're collecting money in. This determines which payment
                                    methods are available and can't be changed after an order is made.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Payout Country</label>
                                    <select class="form-control">
                                        <option>United States</option>
                                        <option>Pakistan</option>
                                        <option>Australia</option>
                                        <option>Russia</option>
                                    </select>
                                </div>
                            </div>

                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <select class="form-control">
                                        <option>USD</option>
                                        <option>PKR</option>
                                        <option>AUD</option>
                                        <option>RUB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Sell tickets using</h2>
                                <div class="payment-processing">
                                    Neabz - Payment Processing
                                    <div class="payment-icons-container"><span class="eds-l-mar-right-1"><i
                                                class="eds-vector-image" data-spec="icon" data-testid="icon"
                                                aria-hidden="true"><svg viewBox="0 0 48 32"
                                                    style="height: 16px; width: 24px;">
                                                    <path fill="#6983D7"
                                                        d="M0 3c0-1.6 1.4-3 3-3h42c1.7 0 3 1.4 3 3v26c0 1.6-1.3 3-3 3H3c-1.6 0-3-1.4-3-3V3z">
                                                    </path>
                                                    <ellipse fill-rule="evenodd" clip-rule="evenodd" fill="#F6635F"
                                                        cx="17.7" cy="16.1" rx="9.6" ry="9.5"></ellipse>
                                                    <ellipse fill-rule="evenodd" clip-rule="evenodd" fill="#FFB548"
                                                        cx="31.1" cy="16.1" rx="9.6" ry="9.5"></ellipse>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FF8150"
                                                        d="M24.4 22.9c1.8-1.7 2.9-4.1 2.9-6.8s-1.1-5-2.9-6.8c-1.8 1.7-2.9 4.1-2.9 6.8s1.1 5.1 2.9 6.8z">
                                                    </path>
                                                </svg></i></span><span class="eds-l-mar-right-1"><i class="eds-vector-image"
                                                data-spec="icon" data-testid="icon" aria-hidden="true"><svg
                                                    viewBox="0 0 48 32" style="height: 16px; width: 24px;">
                                                    <path fill="#FFF"
                                                        d="M0 3c0-1.6 1.4-3 3-3h42c1.7 0 3 1.4 3 3v26c0 1.6-1.3 3-3 3H3c-1.6 0-3-1.4-3-3V3z">
                                                    </path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#26337A"
                                                        d="M38.4 20.9h2.5l-2.1-10.3h-2.2c-1 0-1.2.8-1.2.8l-4 9.5h2.8l.6-1.5h3.4l.2 1.5zm-3-3.6l1.4-3.9.8 3.9h-2.2zm-3.9-4.2c-1.1-.6-3.8-.8-3.8.4 0 1.2 3.7 1.4 3.7 4.1 0 2.6-2.8 3.5-4.6 3.5-1.8 0-3-.6-3-.6l.4-2.3c1.1.9 4.4 1.1 4.4-.3 0-1.4-3.7-1.4-3.7-4.1 0-2.8 3.2-3.4 4.5-3.4 1.2 0 2.4.4 2.4.4l-.3 2.3m-9.3 7.8h-2.7l1.7-10.3h2.7l-1.7 10.3m-4.9-10.3h2.9l-4.3 10.3h-2.8l-2.3-9C9.3 11.1 8 10.8 8 10.8v-.2h4.2c1.2 0 1.3.9 1.3.9l.9 4.6.3 1.5 2.6-7">
                                                    </path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#26337A"
                                                        d="M14.4 16.2l-.9-4.6s-.1-.9-1.3-.9H8v.2s2 .4 4 2c1.8 1.4 2.4 3.3 2.4 3.3">
                                                    </path>
                                                </svg></i></span><span class="eds-l-mar-right-1"><i class="eds-vector-image"
                                                data-spec="icon" data-testid="icon" aria-hidden="true"><svg
                                                    viewBox="0 0 48 32" style="height: 16px; width: 24px;">
                                                    <path fill="#FFF"
                                                        d="M0 3c0-1.6 1.4-3 3-3h42c1.7 0 3 1.4 3 3v26c0 1.6-1.3 3-3 3H3c-1.6 0-3-1.4-3-3V3z">
                                                    </path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#26337A"
                                                        d="M38.4 20.9h2.5l-2.1-10.3h-2.2c-1 0-1.2.8-1.2.8l-4 9.5h2.8l.6-1.5h3.4l.2 1.5zm-3-3.6l1.4-3.9.8 3.9h-2.2zm-3.9-4.2c-1.1-.6-3.8-.8-3.8.4 0 1.2 3.7 1.4 3.7 4.1 0 2.6-2.8 3.5-4.6 3.5-1.8 0-3-.6-3-.6l.4-2.3c1.1.9 4.4 1.1 4.4-.3 0-1.4-3.7-1.4-3.7-4.1 0-2.8 3.2-3.4 4.5-3.4 1.2 0 2.4.4 2.4.4l-.3 2.3m-9.3 7.8h-2.7l1.7-10.3h2.7l-1.7 10.3m-4.9-10.3h2.9l-4.3 10.3h-2.8l-2.3-9C9.3 11.1 8 10.8 8 10.8v-.2h4.2c1.2 0 1.3.9 1.3.9l.9 4.6.3 1.5 2.6-7">
                                                    </path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#26337A"
                                                        d="M14.4 16.2l-.9-4.6s-.1-.9-1.3-.9H8v.2s2 .4 4 2c1.8 1.4 2.4 3.3 2.4 3.3">
                                                    </path>
                                                </svg></i></span><span class="eds-l-mar-right-1"><i class="eds-vector-image"
                                                data-spec="icon" data-testid="icon" aria-hidden="true"><svg
                                                    viewBox="0 0 48 32" style="height: 16px; width: 24px;">
                                                    <path fill="#5EC1EC"
                                                        d="M0 3c0-1.6 1.3-3 3-3h42c1.6 0 3 1.3 3 3v26c0 1.6-1.3 3-3 3H3c-1.6 0-3-1.3-3-3V3z">
                                                    </path>
                                                    <path fill="#FFF"
                                                        d="M48 19.2h-2.5c-.2 0-.4 0-.5.1-.1.1-.2.2-.2.4s.1.4.3.4c.1 0 .3.1.5.1h.7c.7 0 1.2.1 1.5.5.1 0 .1.1.1.1M48 23c-.3.5-1 .7-1.8.7h-2.6v-1.2h2.6c.3 0 .4 0 .5-.1.1-.1.2-.2.2-.4s-.1-.3-.2-.4c-.1-.1-.2-.1-.5-.1-1.3 0-2.8 0-2.8-1.7 0-.8.5-1.7 1.9-1.7H48V17h-2.5c-.8 0-1.3.2-1.7.5V17h-3.7c-.6 0-1.3.1-1.6.5V17h-6.6v.5c-.5-.4-1.4-.5-1.8-.5h-4.4v.5c-.4-.4-1.3-.5-1.9-.5H19l-1.1 1.2-1-1.2H9.5v7.9h7.1l1.1-1.2 1.1 1.2h4.4V23h.4c.6 0 1.3 0 1.9-.3v2.1h3.6v-2.1h.2c.2 0 .2 0 .2.2v1.8h11c.7 0 1.4-.2 1.8-.5v.5H46c.7 0 1.4-.1 2-.4V23zm-5.4-2.3c.3.3.4.6.4 1.2 0 1.2-.8 1.8-2.1 1.8h-2.6v-1.2h2.6c.3 0 .4 0 .6-.1.1-.1.2-.2.2-.4s-.1-.3-.2-.4c-.1-.1-.2-.1-.5-.1-1.3 0-2.8 0-2.8-1.7 0-.8.5-1.7 1.9-1.7h2.7v1.2h-2.5c-.2 0-.4 0-.5.1-.1.1-.2.2-.2.4s.1.4.3.4c.1 0 .3.1.5.1h.7c.7 0 1.2.1 1.5.4zm-12.2-.3c-.2.1-.4.1-.7.1h-1.6v-1.3h1.7c.2 0 .5 0 .6.1.2.1.3.3.3.5 0 .3-.1.5-.3.6zm.9.7c.3.1.5.3.7.5.2.3.2.5.2 1v1.1h-1.4V23c0-.3 0-.8-.2-1.1-.2-.2-.5-.3-1-.3h-1.4v2.1h-1.4V18h3.1c.7 0 1.2 0 1.6.3.4.3.7.6.7 1.3 0 .9-.6 1.3-.9 1.5zM33 18h4.5v1.2h-3.2v1h3.1v1.2h-3.1v1.1h3.2v1.2H33V18zm-9.1 2.6h-1.7v-1.4H24c.5 0 .8.2.8.7-.1.5-.4.7-.9.7zm-3.1 2.6l-2.1-2.3 2.1-2.2v4.5zm-5.4-.7h-3.3v-1.1h3v-1.2h-3v-1h3.4l1.5 1.6-1.6 1.7zm10.8-2.6c0 1.6-1.2 1.9-2.3 1.9h-1.7v1.9h-2.6l-1.7-1.9-1.7 1.9h-5.3V18h5.4l1.7 1.9 1.7-1.9H24c.9 0 2.2.3 2.2 1.9zM4.3 11.5l-.9-2.2-.9 2.3m22.2-1c-.2.1-.4.1-.7.1h-1.6V9.5H24c.2 0 .5 0 .6.1.2.1.3.3.3.5s-.1.4-.2.5zm11.7.9l-.9-2.3-.9 2.3h1.8zM14.6 14h-1.4V9.6l-2 4.4H10L8 9.6V14H5.3l-.5-1.3H2L1.5 14H0l2.4-5.6h2l2.3 5.3V8.3h2.2l1.8 3.8 1.6-3.8h2.2l.1 5.7zm5.5 0h-4.5V8.3h4.5v1.2h-3.2v1H20v1.2h-3.1v1.1h3.2V14zm6.3-4.2c0 .9-.6 1.4-1 1.5.3.1.5.3.7.5.2.3.2.5.2 1V14H25v-.7c0-.3 0-.8-.2-1.1-.2-.2-.5-.2-1-.2h-1.4v2H21V8.3h3.1c.7 0 1.2 0 1.6.3.5.2.7.6.7 1.2zm2.2 4.2h-1.4V8.3h1.4V14zm16 0h-1.9l-2.6-4.2V14h-2.7l-.5-1.3H34l-.5 1.3h-1.6c-.7 0-1.5-.1-2-.6s-.7-1.1-.7-2.2c0-.8.1-1.6.7-2.2.4-.5 1.1-.7 2-.7h1.3v1.2h-1.3c-.5 0-.8.1-1 .3-.2.2-.4.7-.4 1.3 0 .6.1 1 .4 1.3.2.2.6.3.9.3h.6l1.9-4.4h2l2.3 5.3V8.3h2.1l2.4 3.9V8.3h1.4V14h.1zM0 15.1h2.3l.5-1.3H4l.5 1.3H9v-1l.4 1h2.4l.4-1v1h11.3V13h.2c.2 0 .2 0 .2.3v1.8h5.8v-.5c.5.3 1.2.5 2.2.5h2.5l.5-1.3H36l.5 1.3h4.7v-1.2l.7 1.2h3.8V7.2H42v.9l-.5-.9h-3.8v.9l-.5-.9H32c-.9 0-1.6.1-2.3.5v-.5h-3.6v.5c-.4-.3-.9-.5-1.5-.5H11.5l-.9 2-.9-2H5.6v.9l-.4-.9H1.6L0 10.9v4.2z">
                                                    </path>
                                                </svg></i></span><span class="eds-l-mar-right-1"><i class="eds-vector-image"
                                                data-spec="icon" data-testid="icon" aria-hidden="true"><svg
                                                    viewBox="0 0 48 32" style="height: 16px; width: 24px;">
                                                    <path fill="#FFEEDA"
                                                        d="M0 3c0-1.6 1.4-3 3-3h42c1.7 0 3 1.4 3 3v25.9c0 1.7-1.3 3-3 3H3c-1.6 0-3-1.3-3-3V3z">
                                                    </path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FFA821"
                                                        d="M19 32h26c1.7 0 3-1.3 3-3V14c-4.4 8.2-15.1 14.8-29 18z"></path>
                                                    <ellipse fill-rule="evenodd" clip-rule="evenodd" fill="#FFA821" cx="24"
                                                        cy="16.2" rx="6.7" ry="6.6"></ellipse>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#FA9A06"
                                                        d="M28.4 11.2c-1.2-1-2.7-1.6-4.4-1.6-3.7 0-6.7 3-6.7 6.6 0 2.1 1 4 2.5 5.2 1.2-4.5 4.4-8.2 8.6-10.2z">
                                                    </path>
                                                </svg></i></span></div>

                                    <ul>
                                        <li>Simple checkout for attendees</li>
                                        <li>Accept on-site payments</li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Offline options (optional)</h4>
                                <p>Collect payments from attendees by check, invoice, or at the event. Orders processed
                                    through Eventbrite are subject to service fees.</p>
                                <br>
                                <p>Payment methods you'll accept:</p>

                                <div class="form-group">

                                    <input type="checkbox" id="check" class="check" name="check" value="check">
                                    <label for="check"> Check</label><br>

                                </div>
                                <div class="form-group check-textbox">
                                    <label>Add optional instructions for attendees</label>
                                    <textarea class="form-control" rows="3"
                                        placeholder="e.g. Make checks payable to XYZ"></textarea>
                                </div>
                                <div class="form-group">

                                    <input type="checkbox" id="pay_at_the_event" class="pay_at_the_event"
                                        name="pay_at_the_event" value="pay_at_the_event">
                                    <label for=" pay_at_the_event"> Pay at the event</label><br>

                                </div>
                                <div class="form-group pay_at_the_event-textbox">
                                    <label>Add optional instructions for attendees</label>
                                    <textarea class="form-control" rows="3"
                                        placeholder="e.g. Please bring exact change"></textarea>
                                </div>
                                <div class="form-group">

                                    <input type="checkbox" id="pay_by_invoice" class="pay_by_invoice" name="pay_by_invoice"
                                        value="pay_by_invoice">
                                    <label for="pay_by_invoice"> Pay by invoice</label><br>

                                </div>
                                <div class="form-group pay_by_invoice-textbox">
                                    <label>Add optional instructions for attendees</label>
                                    <textarea class="form-control" rows="3"
                                        placeholder="e.g. Invoices are due 7 days after receipt"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <div class="box-footer">

            <button type="submit" class="btn btn-info">Manage payout method</button>
        </div>


</div>
    </section>




@endsection
