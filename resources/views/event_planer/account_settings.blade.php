@extends('layouts.event_planer.template')
@section('title', 'Account Settings')
@section('custom-css')
@endsection
@section('mainBody')
<section class="content">
<div class="container" id="account-setting">
   <div class="row">
      <form action="{{ route('insert_event_account_settings') }}" method="post" enctype="multipart/form-data">
         @csrf
         @if (session()->has('message'))
         <div class="alert alert-success">
            {{ session()->get('message') }}
         </div>
         @endif
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Account Information</h3>
                  <hr class="solid">
               </div>
               <!-- /.box-header -->
               @if(isset($eventAccountSettings))
               <div class="box-body">
                  <section class="account-info">
                     <div class="form-group">
                        <label>Profile Photo</label>
                        <br>
                        <img class="img-square" src="{{ asset($eventAccountSettings->img) }}"
                           style="width: auto; height: 86px;" alt="User Avatar">
                        <br><br>
                        <input type="file" id="img" name="img" accept="image/*">
                     </div>
                  </section>
                  <section class="contact-info">
                     <h3>Contact Information</h3>
                     <div class="form-group">
                        <label>Prefix</label>
                        <select class="form-control" required name="prefix" required>
                           <option value="{{ $eventAccountSettings->prefix }}">
                              {{ $eventAccountSettings->prefix }}
                           </option>
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
                              <input type="text" class="form-control"
                                 placeholder="Enter Your First Name" name="first_name" required
                                 value="{{ $eventAccountSettings->first_name }}" >
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" class="form-control" placeholder="Enter Your Last Name"
                                 name="last_name" required
                                 value="{{ $eventAccountSettings->last_name }}">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label>Suffix</label>
                        <input type="text" class="form-control" name="suffix" required
                           value="{{ $eventAccountSettings->suffix }}">
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Home Phone</label>
                              <input type="text" class="form-control" name="home_phone" required
                                 value="{{ $eventAccountSettings->home_phone }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Cell Phone</label>
                              <input type="text" class="form-control" name="cell_phone" required
                                 value="{{ $eventAccountSettings->cell_phone }}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Job Title</label>
                              <input type="text" class="form-control" name="job_title" required
                                 value="{{ $eventAccountSettings->job_title }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Company / Organization</label>
                              <input type="text" class="form-control" name="company" required
                                 value="{{ $eventAccountSettings->company }}">
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Website</label>
                              <input type="text" class="form-control" name="website" required
                                 value="{{ $eventAccountSettings->website }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Blog</label>
                              <input type="text" class="form-control" name="blog" required
                                 value="{{ $eventAccountSettings->blog }}">
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="home-address">
                     <h3>Home Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="home_address_one" required
                           value="{{ $eventAccountSettings->home_address_one }}">
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="home_address_two" required
                           value="{{ $eventAccountSettings->home_address_two }}">
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="home_address_city" required
                           value="{{ $eventAccountSettings->home_address_city }}">
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="home_address_country" required>
                           <option value="{{ $eventAccountSettings->home_address_country }}">
                              {{ $eventAccountSettings->getCountry->name }}
                           </option>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="home_address_zip_code"
                                 required value="{{ $eventAccountSettings->home_address_zip_code }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="home_address_state" required>
                                 <option value="{{ $eventAccountSettings->home_address_state }}">
                                    {{ $eventAccountSettings->getState->name }}
                                 </option>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="billing-address">
                     <h3>Billing Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="billing_address_one" required
                           value="{{ $eventAccountSettings->billing_address_one }}">
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="billing_address_two"
                           value="{{ $eventAccountSettings->billing_address_two }}">
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="billing_address_city" required
                           value="{{ $eventAccountSettings->billing_address_city }}">
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="billing_address_country" required>
                           <option value="{{ $eventAccountSettings->billing_address_country }}">
                              {{ $eventAccountSettings->getBillingCountry->name }}
                           </option>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="billing_address_zip" required
                                 value="{{ $eventAccountSettings->billing_address_zip }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="billing_address_state" required>
                                 <option value="{{ $eventAccountSettings->billing_address_state }}">
                                    {{ $eventAccountSettings->getBillingState->name }}
                                 </option>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="shipping-address">
                     <h3>Shipping Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="shipping_address_one" required
                           value="{{ $eventAccountSettings->shipping_address_one }}">
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="shipping_address_two" required
                           value="{{ $eventAccountSettings->shipping_address_two }}">
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="shipping_address_city"
                           value="{{ $eventAccountSettings->shipping_address_city }}">
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="shipping_address_country" required>
                           <option value="{{ $eventAccountSettings->shipping_address_country }}">
                              {{ $eventAccountSettings->getShippingCountry->name }}
                           </option>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="shipping_address_zip" required
                                 value="{{ $eventAccountSettings->shipping_address_zip }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="shipping_address_state" required>
                                 <option value="{{ $eventAccountSettings->shipping_address_state }}">
                                    {{ $eventAccountSettings->getShippingState->name }}
                                 </option>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="work-address">
                     <h3>Work Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="work_address_one" required
                           value="{{ $eventAccountSettings->work_address_one }}">
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="work_address_two" required
                           value="{{ $eventAccountSettings->work_address_two }}">
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="work_address_city" required
                           value="{{ $eventAccountSettings->work_address_city }}">
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="work_address_country" required>
                           <option value="{{ $eventAccountSettings->work_address_country }}">
                              {{ $eventAccountSettings->getWorkCountry->name }}
                           </option>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="work_address_zip" required
                                 value="{{ $eventAccountSettings->work_address_zip }}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="work_address_state" required>
                                 <option value="{{ $eventAccountSettings->work_address_state }}">
                                    {{ $eventAccountSettings->getWorkState->name }}
                                 </option>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
               @else
               <div class="box-body">
                  <section class="account-info">
                     <div class="form-group">
                        <label>Profile Photo</label>
                        <br>
                        <img class="img-square" src="{{ asset('assets/dist/img/user1-128x128.jpg') }}"
                           style="width: auto; height: 86px;" alt="User Avatar">
                        <br><br>
                        <input type="file" id="img" name="img" accept="image/*">
                     </div>
                  </section>
                  <section class="contact-info">
                     <h3>Contact Information</h3>
                     <div class="form-group">
                        <label>Prefix</label>
                        <select class="form-control" required name="prefix" required>
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
                        <input type="text" class="form-control" name="suffix" required>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Home Phone</label>
                              <input type="text" class="form-control" name="home_phone" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Cell Phone</label>
                              <input type="text" class="form-control" name="cell_phone" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Job Title</label>
                              <input type="text" class="form-control" name="job_title" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Company / Organization</label>
                              <input type="text" class="form-control" name="company" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Website</label>
                              <input type="text" class="form-control" name="website" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Blog</label>
                              <input type="text" class="form-control" name="blog" required>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="home-address">
                     <h3>Home Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="home_address_one" required>
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="home_address_two" required>
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="home_address_city" required>
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="home_address_country" required>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="home_address_zip_code"
                                 required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="home_address_state" required>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="billing-address">
                     <h3>Billing Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="billing_address_one" required>
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="billing_address_two" required>
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="billing_address_city" required>
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="billing_address_country" required>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="billing_address_zip" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="billing_address_state" required>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="shipping-address">
                     <h3>Shipping Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="shipping_address_one" required>
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="shipping_address_two" required>
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="shipping_address_city" required>
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="shipping_address_country" required>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="shipping_address_zip" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="shipping_address_state" required>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="work-address">
                     <h3>Work Address</h3>
                     <div class="form-group">
                        <label>Address 1</label>
                        <input type="text" class="form-control" name="work_address_one" required>
                     </div>
                     <div class="form-group">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="work_address_two" required>
                     </div>
                     <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="work_address_city" required>
                     </div>
                     <div class="form-group">
                        <label for="country">Country</label>
                        <select class="form-control" name="work_address_country" required>
                           @foreach ($countries as $country)
                           <option value="{{ $country->id }}">{{ $country->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Zip/Postal Code</label>
                              <input type="text" class="form-control" name="work_address_zip" required>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control" name="work_address_state" required>
                                 @foreach ($states as $state)
                                 <option value="{{ $state->id }}">{{ $state->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
               @endif
            </div>
            <div class="box-footer">
               <button type="submit" class="btn btn-default">Save</button>
            </div>
         </div>
      </form>
   </div>
   </div>

</section>

@endsection
