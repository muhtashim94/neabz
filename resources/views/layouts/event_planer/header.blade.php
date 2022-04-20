<!-- Content Header (Page header) -->


<div class="logo">
    <!-- <h1>
    @yield('title')
    <small>Control panel</small>
  </h1> -->

    <h1>

        <img src="{{ asset('assets\images\eventImages\logo.png') }}"></img>

        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" class="btn btn-default pull-right" id="foin" role="button"> <i class="fa fa-user"
                aria-hidden="true"></i> Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>




    </h1>
</div>

<section class="content-header">


    <!-- <ul class="breadcrumb">
    <li><a href="{{ url('/events/event_dashboard') }}"><button type="button" class="btn btn-primary">Event Dashboard</button></a></li>
    <li><a href="{{ url('/events/create_event') }}"><button type="button"  class="btn btn-primary add-block">Create Event</button></a></li>
    <li><a href="{{ url('/events/orders') }}"><button type="button"  class="btn btn-primary add-block">Event Orders</button></a></li>
    <li><a href="{{ url('/events') }}"><button type="button" class="btn btn-primary">Manage Events</button></a></li>
    <li><a href="{{ url('/events/tickets') }}"><button type="button" class="btn btn-primary">Tickets</button></a></li>
     <li><a href="{{ url('/events/sales_report') }}"><button type="button" class="btn btn-primary">Sales Report</button></a></li>
    <li><a href="{{ url('/events/analytics') }}"><button type="button" class="btn btn-primary">Analytics</button></a></li>
    <li><a href="{{ url('/events/event_calendar') }}"><button type="button" class="btn btn-primary">Event Calendar</button></a></li>
    <li><a href="{{ url('/events/create_organizer') }}"><button type="button" class="btn btn-primary">Create Organizer</button></a></li>
    <li><a href="{{ url('/events/organizers') }}"><button type="button" class="btn btn-primary">Organizers</button></a></li>
    <li><a href="{{ url('/user/contact_organizers') }}"><button type="button" class="btn btn-primary">Contact Organizers</button></a></li>
    <li><a href="{{ url('/events/account_settings') }}"><button type="button" class="btn btn-primary">Account Settings</button></a></li>
    <li><a href="{{ url('/events/order_form') }}"><button type="button" class="btn btn-primary">Order form</button></a></li>
    <li><a href="{{ url('/events/payment_options') }}"><button type="button" class="btn btn-primary">Payment Options</button></a></li>
  </ul> -->


    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

                <h3 style="font-size: 17px; color: #ff5f0c;">Hi, {{Auth::user()->name}}</h3><br>
                <ul class="nav navbar-nav">



                    <li><a href="{{ url('/events/dashboard') }}"> <i class="fas fa-tachometer-alt icoo"></i>
                            <button type="button"> Dashboard</button></a></li>
                    <li><a href="{{ url('/events/create_event') }}"> <i class="fas fa-calendar-plus icoo"></i>
                            <button type="button" class="add-block"> Create Event</button></a></li>
                    <li><a href="{{ url('/events') }}"><i class="fas fa-tasks icoo"></i><button type="button">Manage
                                Events</button></a></li>
                    <li><a href="{{ url('/events/orders') }}"> <i class="fab fa-first-order icoo"></i><button
                                type="button" class="add-block">Event Orders</button></a></li>

                    {{-- <li><a href="{{ url('/events/tickets') }}"> <i class="fas fa-ticket icoo"></i> <button
                                type="button">Tickets</button></a></li> --}}




                    <li><a href="{{ url('/events/organizers') }}"><i class="fa-solid fa-sitemap icoo"></i> <button
                                type="button">Organizers</button></a></li>

                    <li><a href="{{ url('/user/contact_organizers') }}"><i
                                class="fa-solid fa-address-card icoo"></i><button type="button">Contact
                                Organizers</button></a></li>

                    <li><a href="{{ url('/events/sales_report') }}"> <i
                                class="fa-solid fa-chart-column icoo"></i><button type="button">Sales
                                Report</button></a></li>

                    <li><a href="{{ url('/events/analytics') }}"> <i class="fa-solid fa-chart-line icoo"></i><button
                                type="button">Analytics</button></a></li>

                    <li><a href="{{ url('/events/event_calendar') }}"> <i class="fa-solid fa-calendar icoo"></i>
                            <button type="button">Event Calendar</button></a></li>

                    <li><a href="{{ url('/events/account_settings') }}"> <i class="fa-solid fa-gear icoo"></i>
                            <button type="button">Account Settings</button></a></li>





                </ul>

            </div>
        </div>
    </nav>










</section>
