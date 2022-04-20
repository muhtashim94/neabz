<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      @yield('title')
      <small>Control panel</small>
    </h1>
    <ul class="breadcrumb">
      <li><a href="{{ url('/admin/events') }}"><button type="button" class="btn btn-primary">Events</button></a></li>
      <li><a href="{{ url('/admin/event_planners') }}"><button type="button" class="btn btn-primary">Event Planners</button></a></li>
      <li><a href="{{ url('/admin/categories') }}"><button type="button" class="btn btn-primary">Categories</button></a></li>
      <li><a href="{{ url('/admin/sub_categories') }}"><button type="button" class="btn btn-primary">Sub Category</button></a></li>
      <li><a href="{{ url('/admin/account_approvals') }}"><button type="button" class="btn btn-primary">Account Approvals</button></a></li>
      <li><a href="{{ url('/admin/mass_emailing') }}"><button type="button" class="btn btn-primary">Email</button></a></li>
      <li><a href="{{ url('/admin/global_sales_report') }}"><button type="button" class="btn btn-primary">Global Sales Report</button></a></li>
      <li><a href="{{ url('/admin/event_sales_report') }}"><button type="button" class="btn btn-primary">Event Sales Report</button></a></li>
      <li><a href="{{ url('/admin/account_settings') }}"><button type="button" class="btn btn-primary">Account Settings</button></a></li>


    </ul>
  </section>
