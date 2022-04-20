@extends('layouts.admin.template')
@section('title', 'Mass Emailing System')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Mass Emailing System</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Email to Attendees</h3>
                                        <p>Manage how your attendees can pay you.</p>
                                    </div>
                                    <!-- /.box-header -->


                                    <div class="box-body">

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Name"
                                                value="abc">
                                        </div>

                                        <div class="form-group">
                                            <label>Reply-To Email</label>
                                            <input type="email" class="form-control" placeholder="Enter Your Email"
                                                value="kertihekke@vusra.com">
                                        </div>
                                        <div class="form-group">
                                            <label>To</label>
                                            <select class="form-control send-to">
                                                <option value="all_attendees">All Attendees</option>
                                                <option value="all_organizers">All Organizers</option>
                                                <option value="specific_users">Specific Users</option>
                                            </select>
                                        </div>
                                        <div class="specific_users_search">
                                            <div class="input-group">
                                                <input type="text" id="search" name="search" class="form-control"
                                                    placeholder="Search...">
                                                <span class="input-group-btn">
                                                    <button type="submit" name="search" id="search-btn"
                                                        class="btn btn-flat"><i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Email Subject"
                                                value="Food Event has been postponed">
                                        </div>

                                        <label>Message</label>
                                        <textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short><div style="font-size: small;">
                                                <p>Hello,</p>
                                                <p>I'm writing to inform you that abcsaf has been postponed. Here's some essential information you may need to know about this change.</p>
                                                <br />
                                                <h3>Changes to this event</h3>
                                                <p><span style="background-color: #ffff99;"><em>[insert text explaining why this event is postponed]</em></span></p>
                                                <br />
                                                <h3>Getting a refund</h3>
                                                <p><span style="background-color: #ffff99;"><em>[insert text about your refund policy here]</em></span></p>
                                                <br />
                                                <h3>Check in for updates</h3>
                                                <p><span style="background-color: #ffff99;"><em>[insert text about where your buyers can find updates about any future event]</em></span></p>
                                                <br />
                                                <p>Thank you for your continued support and we hope to see you at our next event in the future!</p>
                                                </div></textarea>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>

   


    </section>




@endsection
@section('custom-js')
    {{-- CKEditor --}}
    <script src="https://cdn.ckeditor.com/4.17.2/standard-all/ckeditor.js"></script>

    {{-- CKEditor --}}
    <script>
        CKEDITOR.replace('editor1', {
            height: 260,
            width: 700,
            removeButtons: 'PasteFromWord'
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.specific_users_search').hide();
            $('.send-to').on('click', function() {
                var send_to = $('.send-to').val();
                if (send_to == "specific_users") {
                    $('.specific_users_search').show();
                } else {
                    $('.specific_users_search').hide();
                }


            });


        });
    </script>


@endsection
