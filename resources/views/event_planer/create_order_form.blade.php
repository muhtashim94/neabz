@extends('layouts.event_planer.template')
@section('title', 'Create Order Form')
@section('mainBody')


    <section class="content">
    <div class="container" id="order1-form">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <h1>Order Form</h1>
                <p>Manage the information you collect from attendees during checkout.</p>
                <h1>Collect information from</h1>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_buyer_only" data-toggle="tab" aria-expanded="true">Buyer
                                Only</a></li>
                        <li class=""><a href="#tab_each_attendee" data-toggle="tab" aria-expanded="false">Each
                                attendee</a></li>


                        <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_buyer_only">
                            <h2>What do you need to know about your attendees?</h2>
                            <p>We collect first name, last name and email by default.</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <th>Details</th>
                                            <th>Include</th>
                                            <th>Required</th>
                                        </tr>
                                        <tr>
                                            <td>Prefix (Mr., Mrs., etc.)</td>
                                            <td><label class="switch">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </label></td>
                                            <td>Germany</td>
                                        </tr>
                                        <tr>
                                            <td>Suffix</td>
                                            <td>Francisco Chang</td>
                                            <td>Mexico</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>Roland Mendel</td>
                                            <td>Austria</td>
                                        </tr>
                                        <tr>
                                            <td>Home phone</td>
                                            <td>Helen Bennett</td>
                                            <td>UK</td>
                                        </tr>
                                        <tr>
                                            <td>Cell phone</td>
                                            <td>Yoshi Tannamuri</td>
                                            <td>Canada</td>
                                        </tr>
                                        <tr>
                                            <td>Home address</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping address</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>
                                        <tr>
                                            <td>Website</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>
                                        <tr>
                                            <td>Blog</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>
                                        <tr>
                                            <td>Job title</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>
                                        <tr>
                                            <td>Company / Organization</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>

                                        <tr>
                                            <td>Work address</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>
                                        <tr>
                                            <td> Work phone</td>
                                            <td>Giovanni Rovelli</td>
                                            <td>Italy</td>
                                        </tr>

                                    </table>
                                </div>

                            </div>



                        </div>

                        <div class="tab-pane" id="tab_each_attendee">
                            <p>You’ll be able to set a schedule for your recurring event in the next step. Event details and
                                ticket types will apply to all instances.</p>
                            <div class="form-group">
                                <input type="checkbox" id="end" name="end" value="end">
                                <label for="end"> Display end time.</label><br>
                                <p>The end time of your event will be displayed to attendees.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
