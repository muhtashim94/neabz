@extends('layouts.user.template')
@section('title', 'Account Settings')
@section('mainBody')

    <section class="content">
        <div class="container">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->

                    <form action="{{route('insert_account_setting')}}" method="post" enctype="multipart/form-data">
                        <div class="box-body">

                            @csrf
                            @if (isset($accountSettings))
                            <section class="contact-info">
                                <h3>Contact Information</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Organizer profile image</label>
                                            <br>
                                            <br>
                                            <img class="img-square" src="{{asset($accountSettings->img)}}" style="width:100px; height:100px;" alt="User Avatar">
                                            <br>
                                            <br>
                                            <input type="file" id="img" name="img" accept="image/*" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Prefix</label>
                                    <select class="form-control" name="prefix" value="{{$accountSettings->prefix}}" required>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mx.">Mx.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Rev.">Rev.</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your First Name"
                                                name="first_name" value="{{$accountSettings->first_name}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Last Name"
                                                name="last_name" value="{{$accountSettings->last_name}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Suffix</label>
                                    <input type="text" class="form-control" name="suffix" value="{{$accountSettings->suffix}}" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Home Phone</label>
                                            <input type="text" class="form-control" name="home_phone" value="{{$accountSettings->home_phone}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cell Phone</label>
                                            <input type="text" class="form-control" name="cell_phone" value="{{$accountSettings->cell_phone}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designation" value="{{$accountSettings->designation}}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="{{$accountSettings->address}}" required>
                                        </div>
                                    </div>

                                </div>


                            </section>
                            @else
                            <section class="contact-info">
                                <h3>Contact Information</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Organizer profile image</label>
                                            <br>

                                            <input type="file" id="img" name="img" accept="image/*" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Prefix</label>
                                    <select class="form-control" name="prefix" required>
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mx.">Mx.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                        <option value="Rev.">Rev.</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your First Name"
                                                name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Last Name"
                                                name="last_name" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Suffix</label>
                                    <input type="text" class="form-control" name="suffix" required >
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Home Phone</label>
                                            <input type="text" class="form-control" name="home_phone" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cell Phone</label>
                                            <input type="text" class="form-control" name="cell_phone" required >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control" name="designation" required >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" required >
                                        </div>
                                    </div>

                                </div>


                            </section>
                            @endif


                            <div class="box-footer">
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>


        </div>


</div>


    </section>




@endsection
