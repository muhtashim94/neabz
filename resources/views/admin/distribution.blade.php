@extends('layouts.admin.template')
@section('title', 'Distribution List')

@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Distribution List</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Event Name</th>
                                            <th>Organizer Name</th>
                                            <th>Email</th>
                                            <th>Distribution %</th>
                                            <th>Total Revenue</th>
                                            <th>Commission</th>
                                        </tr>

                                        <tr>
                                            <td> {{$distribution->events->title}}</td>
                                            <td> {{$distribution->events->getOrganizer->name}}</td>
                                            <td> {{$distribution->email}}</td>
                                            <td> {{$distribution->events->getOrganizer->distribution}}%</td>
                                            <td> {{$totalRevenue}}</td>
                                            <td> {{$adminCommision}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>


        </div>

    </section>




@endsection

