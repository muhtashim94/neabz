<!DOCTYPE html>
<html>

<head>

    <style>
        input#exampleInputEventTitle {
            padding: 1%;
            border: 1px solid #d1d1d1;
            border-radius: 0px;
        }

        select.form-control {

            border: 1px solid #d1d1d1;
            border-radius: 0px;
        }

        .form-control {
            height: unset !important;

        }

        input[type=date].form-control,
        input[type=time].form-control,
        input[type=datetime-local].form-control,
        input[type=month].form-control {
            line-height: 28px !important;
        }

        .input-group-btn {
            position: relative;
            font-size: 0;
            white-space: nowrap;
            top: -14px;
        }

        h3.box-title {
            font-weight: 800;
        }

        ul.nav.nav-pills li a {
            border-radius: 0px;
            margin-bottom: 12%;
        }

        hr {
            margin-top: 47px;
            margin-bottom: 40px;
            border: 0;
            border-top: 1px solid #a9a0a0;
        }


        footer#footer0 {
            box-shadow: rgb(100 100 111 / 54%) 0px 7px 29px 0px;
            padding-top: 1%;
            padding-bottom: 1%;
        }

div#sear12 {
    margin-top: 2%;
}

        div#evt-desh {

            padding-top: 0%;
            padding-bottom: 5%;
        }
        th {
    background-color: black;
    color: white;
}
        .event-detail {

            padding: 5%;
            height: 150px;
            text-align: center;
        }

        div#event1 {

            padding: 1%;


        }

        div#ticket {


            padding: 1%;
        }

        div#analytic {

            padding: 1%;

        }

        div#event-calender {

            padding: 1%;

        }

        div#create-org {

            padding: 1%;

        }

        div#account-setting {

            padding: 1%;

        }

        div#org-data {
            margin-top: unset !important;
        }

        div#payment-option {

            padding: 1%;

        }

        .fa-solid,
        .fas {
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 5px;
        }

        .progress {
            height: 19px !important;
            border-radius: 74px !important;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #f5f5f5;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
            box-shadow: inset 0 1px 2px rgb(0 0 0 / 10%);
        }

        .progress-bar {
            background-image: -webkit-linear-gradient(top, #337ab7 0, #286090 100%);
            background-image: -o-linear-gradient(top, #337ab7 0, #286090 100%);
            background-image: -webkit-gradient(linear, left top, left bottom, from(#337ab7), to(#286090));
            background-image: linear-gradient(to bottom, #ff5f0c 0, #ff5f0c 100%) !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff337ab7', endColorstr='#ff286090', GradientType=0);
            background-repeat: repeat-x;
        }

        p.pro12 {
            color: #ff5f0c;
        }

        .event_details h4 b {
            color: #ff5f0c;
        }

        i.fa-solid.fa-circle {
            color: #087007 !important;
        }

        .logo h1 {
            background-color: #cacaca;
            margin: 0;
            padding-top: 8px;
            padding-bottom: 1px;
        }

        .logo h1 img {
            margin-left: 3%;
            height: 100px;
        }

        div#event1 .event_details {
            display: inline-table;
        }

        div#event1 img.img-square {
            width: 74px !important;
        }

        div#event1 .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }

        div#event1 img.img-square {
            width: 74px !important;
            position: relative;
            top: 20px;
        }

        tr.tab00 {
            background-color: #efefef;
        }

        div#event1 .event_details {
            display: inline-table;
            margin-left: 2%;
        }

        div#order1 {

            padding: 1%;

        }

        div#order1-form {

            padding: 1%;

        }

        div#sales-report {

            padding: 1%;

        }

        /* width */
        ::-webkit-scrollbar {
            display: none;
            width: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #ff5f0c;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #ff5f0c;
        }

        .navbar-nav>li>a {
            padding-top: 15px;
            padding-bottom: 15px;
            padding-left: 0 !important;
        }

        input#search {


            border-radius: 0px;
        }

        i.fa.fa-user {
            color: #df520a;
        }

        #event1 button#search-btn {
            top: 26px;
            height: 35px;
        }

        .input-group-btn:last-child>.btn,
        .input-group-btn:last-child>.btn-group {
            z-index: 2;
            margin-left: -1px;
            position: relative;
            top: 12px;
            height: 38px;
            border-radius: unset;
        }

        .logo h1 {
            background-color: #cacaca;
            margin: 0;

        }

        nav.navbar.navbar-inverse {
            width: 230px;
            position: absolute;
            box-shadow: rgb(100 100 111 / 54%) 0px 7px 29px 0px;
        }
        th {
    background-color: #cacaca;
    color: black;
}
        footer#footer0 {
            display: none;
        }

        /* .container {
    position: absolute;
    height: 100%;
    width: calc(100% - 250px)!important;
    left: 230px;
} */

        .container {
            position: absolute;
            height: 100%;
            width: calc(100% - 250px) !important;
            left: 230px;
            overflow: auto;
            height: 900px;
        }

        ul.nav.navbar-nav li a button {
            background-color: unset;
            border: unset;
            color: black;
        }

        nav.navbar.navbar-inverse {
            width: 230px;
            position: absolute;

            height: 900px;
        }

        .navbar-inverse {
            background-image: -webkit-linear-gradient(top, #3c3c3c 0, #222 100%);
            background-image: -o-linear-gradient(top, #3c3c3c 0, #222 100%);
            background-image: -webkit-gradient(linear, left top, left bottom, from(#3c3c3c), to(#222));
            background-image: unset !important;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff3c3c3c', endColorstr='#ff222222', GradientType=0);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            background-repeat: repeat-x;
            border-radius: 4px;
        }

        .navbar-inverse {
            background-color: #222;
            border-color: #080808;
            border-radius: unset !important;
            padding-top: 10px;
        }

        .nav-pills>li.active>a,
        .nav-pills>li.active>a:focus,
        .nav-pills>li.active>a:hover {
            color: #fff;
            background-color: #ff5f0c !important;
        }

        nav.navbar.navbar-inverse {
            background-color: #f4f4f4;
            border: unset;
        }

        .navbar-inverse .navbar-brand,
        .navbar-inverse .navbar-nav>li>a {
            text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);
            font-size: 12px !important;
        }

        i.icoo {
            font-size: 13px;
            color: #ff5f0c;
        }

        .fa-ticket:before {
            content: "\f145";
            font-size: 11px;
        }

        .event-detail {
            box-shadow: rgb(100 100 111 / 54%) 0px 7px 29px 0px;
            width: 230px;
            padding: 7px;
            border-radius: unset !important;
            border: unset !important;
        }


        #event-calender span.input-group-btn {
            position: relative;
            top: 1px;
        }

        .navbar-inverse .navbar-brand,
        .navbar-inverse .navbar-nav>li>a {
            text-shadow: 0 -1px 0 rgb(0 0 0 / 25%);
            /* font-family: Poppins!important; */
            font-family: 'Poppins', sans-serif;
        }

        #evt-desh i.fa-solid.fa-copy.copied {
            font-size: 15px;
        }

        .py-4 {

            background-image: url(assets/images/eventImages/12.jpg);
            background-repeat: no-repeat, repeat;


        }

        .details10 button.btn.btn-default.mt-5 {

            margin-top: 2%;
        }

        .details10 .col-md-12 {
            padding: 0;
        }

        a#foin {
            margin-top: 2%;
            margin-right: 2%;
        }

        div#org-data #orga123 {
            margin-top: -4%;
        }

        =#publish h5.description-header {
            font-size: 33px;
        }

        span.description-text {
            font-weight: 800;
        }


        div#evt-desh .event-detail {
            box-shadow: rgb(100 100 111 / 54%) 0px 7px 29px 0px;
            width: 100%;
            padding: 7px;
            border-radius: unset !important;
            border: unset !important;
        }

        .cent h4 {
            margin-top: 15%;
        }

        i.fa.fa-ellipsis-v {
            font-size: 30px;
        }

        i.fa.fa-ellipsis-v {
            color: #ff5f0c;
        }

        .fa-circle:before {
            content: "\f00c" !important;
            font-size: 14px;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: -61px !important;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 93px !important;
            padding: 5px 0;
            margin: 2px 0 0;
            font-size: 14px;
            text-align: left;
            list-style: none;
            background-color: #fff;
            -webkit-background-clip: padding-box;
            background-clip: padding-box;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 4px;
            -webkit-box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
            box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
        }

        button#dropdownMenu1 {
            background: unset;
            border: unset;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Neabz | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->


    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/3f960907f8.js" crossorigin="anonymous"></script>


    <link href="/public/assets/fonts/Neue Plak Black.tttf">

    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.4/css/select.dataTables.min.css">
 


    @yield('custom-css')

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- BEGIN: Content-->


        <div class="content-wrapper" style="min-height: 926.281px;">
            @include('layouts.event_planer.header')

            <!-- Start Main content -->
            @yield('mainBody')
            <!-- End Main content -->

        </div>
        <!-- END: Content-->


        @include('layouts.event_planer.footer')

        <!-- jQuery library -->


</body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/select/1.3.4/js/dataTables.select.min.js"></script>




<!-- Page script -->

@yield('custom-js')

</html>