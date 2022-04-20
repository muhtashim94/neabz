@extends('layouts.event_planer.template')
@section('title', 'Order Form')
@section('mainBody')


    <section class="content">
    <div class="container" id="order1">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">

                <h1>Order form</h1>
                <h4>Personalize your checkout experience</h4>
                <ul>
                    <li><i class="fa-solid fa-pen"></i> We collect first name, last name and email by default.</li>
                    <li><i class="fa-solid fa-pen"></i> Customize the information you collect from your attendees.</li>
                    <li><i class="fa-solid fa-pen"></i> Change the time limit for checking out.</li>
                </ul>
                <p>Save time by copying an order form from another event, or create a new one</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                        class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Event status</label>
                            <select class="form-control">
                                <option>All</option>
                                <option>Published</option>
                                <option>Draft</option>
                                <option>Past</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ url('/events/create_order_form') }}"><button type="button"
                                class="btn btn-primary">Create a order new form</button></a>
                    </div>
                    <div class="col-md-4">
                        <label>Lorem ipsum dolor</label><br>
                        <a href="{{ url('/events/create_order_form') }}"><button type="button"
                                class="btn btn-primary">Copy this order form</button></a>
                    </div>
                    <div class="col-md-4">
                        <label>amet consectet</label><br>
                        <a href="{{ url('/events/create_order_form') }}"><button type="button"
                                class="btn btn-primary">Copy this order form</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>consectet</label><br>
                        <a href="{{ url('/events/create_order_form') }}"><button type="button"
                                class="btn btn-primary">Copy this order form</button></a>
                    </div>
                    <div class="col-md-4">
                        <label>dolor sit, amet</label><br>
                        <a href="{{ url('/events/create_order_form') }}"><button type="button"
                                class="btn btn-primary">Copy this order form</button></a>
                    </div>
                    <div class="col-md-4">
                        <label>sit</label><br>
                        <a href="{{ url('/events/create_order_form') }}"><button type="button"
                                class="btn btn-primary">Copy this order form</button></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
