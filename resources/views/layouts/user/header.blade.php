<!-- Content Header (Page header)




<!-- <section class="content-header">
    <h1>
      @yield('title')

    </h1>
    <ul class="breadcrumb">
      <li><a id="even123" href="{{ url('/user/events') }}">
      Events</a></li>
     
      
      <li> <div class="input-group">
                                    <input type="text" id="search" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search"  class="btn btn-flat"><i
                                                class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div></li>


      <li><a href="{{ url('/user/view_user') }}">User Profile</a></li>                          
      <li><a href="{{ url('/user/orders') }}">Orders</a></li>
      <li><a href="{{ url('/user/account_settings') }}">Account Settings</a></li>
    </ul>
  </section> -->




  <nav class="navbar navbar-default">
  

    
    
      
          <ul class="nav navbar-nav justify-content-center">
       <li><a id="even123" href="{{ url('/user/events') }}">Events</a></li>
   <!--    <li id="img10">
          <img class="img-fluid120" src="{{ asset('assets\images\userimages\header-logo.png') }}" >

      </li> -->

<li>  <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" id="search">
      </div>
       <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </form></li>
      
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa-solid fa-gear"></i> </a>
        <ul class="dropdown-menu">
      <li><a href="{{ url('/user/view_user') }}">User Profile</a></li>                          
      <li><a href="{{ url('/user/orders') }}">Orders</a></li>
      <li><a href="{{ url('/user/account_settings') }}">Account Settings</a></li>
        </ul>
      </li>
    </ul>




   


</nav>


