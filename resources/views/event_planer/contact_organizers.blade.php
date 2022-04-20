@extends('layouts.event_planer.template')
@section('title', 'Contact Organizers')
@section('mainBody')

    <section class="content">
    <div class="container" id="org-data">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">User Queries</h3>

                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Reason</th>
                                        <th>Message</th>
                                    </tr>
                                    @if (count($contactOrganizers) == 0)
                                    <tr>
                                       <td  colspan="5"><center>No  found</center></td>
                                    </tr>

                                    @else
                                        @foreach ($contactOrganizers as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->contact_reason }}</td>
                                                <td>{{ $value->message }}</td>

                                            </tr>
                                        @endforeach
                                    @endif




                                </table>

                            </div>
                        </div>





                    </div>
                </div>

            </div>


        </div>
        </div>



    </section>




@endsection
