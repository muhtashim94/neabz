@extends('layouts.admin.template')
@section('title', 'Account Settings')
@section('mainBody')

    <section class="content">
        <form action="{{route('insert_admin_account_settings')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        {{-- <div class="box-header with-border">
                        <h3 class="box-title">Account Settings</h3>
                    </div> --}}
                        <!-- /.box-header -->
                        @if (Session::has('errors'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ Session::get('errors') }}</li>
                                </ul>
                            </div>
                        @endif

                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ Session::get('success') }}</li>
                                </ul>
                            </div>
                        @endif

                        <div class="box-body">
                            <section class="account-info">
                                <div class="form-group">
                                   <label>Profile Photo</label>
                                   <br>
                                   <img class="img-square" src="{{ ($adminAccount) ? asset($adminAccount->image) : asset('assets/dist/img/user1-128x128.jpg')  }}"
                                      style="width: auto; height: 86px;" alt="User Avatar">
                                   <br><br>
                                   <input type="file" id="img" name="img" accept="image/*">
                                </div>
                             </section>
                            <section class="contact-info">
                                <h3>Contact Information</h3>

                                <div class="form-group">
                                    <label>Prefix</label>
                                    <select class="form-control" required name="prefix">
                                        <option value="{{($adminAccount) ? ($adminAccount->prefix) : ""}}">{{($adminAccount) ? ($adminAccount->prefix) : ""}}</option>
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
                                                name="first_name" required value="{{($adminAccount) ? ($adminAccount->first_name) : ""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Last Name"
                                                name="last_name" required value="{{($adminAccount) ? ($adminAccount->last_name) : ""}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Suffix</label>
                                    <input type="text" class="form-control" name="suffix" required value="{{($adminAccount) ? ($adminAccount->suffix) : ""}}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Home Phone</label>
                                            <input type="text" class="form-control" name="home_phone" required value="{{($adminAccount) ? ($adminAccount->home_phone) : ""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Cell Phone</label>
                                            <input type="text" class="form-control" name="cell_phone" required value="{{($adminAccount) ? ($adminAccount->cell_phone) : ""}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Job Title</label>
                                            <input type="text" class="form-control" name="job_title" required value="{{($adminAccount) ? ($adminAccount->job_title) : ""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company / Organization</label>
                                            <input type="text" class="form-control" name="company" required value="{{($adminAccount) ? ($adminAccount->company) : ""}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Website</label>
                                            <input type="text" class="form-control" name="website" required value="{{($adminAccount) ? ($adminAccount->website) : ""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Blog</label>
                                            <input type="text" class="form-control" name="blog" value="{{($adminAccount) ? ($adminAccount->blog) : ""}}">
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="home-address">
                                <h3>Home Address</h3>
                                <div class="form-group">
                                    <label>Address 1</label>
                                    <input type="text" class="form-control" name="address_one" required value="{{($adminAccount) ? ($adminAccount->address_one) : ""}}">
                                </div>
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <input type="text" class="form-control" name="address_two" required value="{{($adminAccount) ? ($adminAccount->address_two) : ""}}">
                                </div>

                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" required value="{{($adminAccount) ? ($adminAccount->city) : ""}}">
                                </div>

                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control" name="country" required>
                                        <option value="{{($adminAccount) ? ($adminAccount->country) : ""}}">{{($adminAccount) ? ($adminAccount->getCountry->name) : ""}}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Zip/Postal Code</label>
                                            <input type="text" class="form-control" name="zip" required value="{{($adminAccount) ? ($adminAccount->zip) : ""}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control" name="state" required>
                                                <option value="{{($adminAccount) ? ($adminAccount->state) : ""}}">{{($adminAccount) ? ($adminAccount->getState->name) : ""}}</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </section>

                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div>
            </div>



        </form>
    </section>




@endsection
