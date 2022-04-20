@extends('layouts.event_planer.template')
@section('title', 'Organizers')
@section('mainBody')

    <section class="content">

    <div class="container" id="org-data">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Organizers Profiles</h3>
                    
                        <a href="{{ url('/events/create_organizer') }}" class="btn btn-default pull-right" id="orga123" role="button">Create Organizer</a>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">

                    

                        <div class="row">
                            <div class="col-md-12">
                                <br><br>
                                <table id="myTable" class="table table-hover">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Followers</th>
                                        <th>Image</th>
                                        <th> </th>
                                    </tr>
                                    @if (count($organizers) == 0)
                                    <tr>
                                       <td  colspan="5"><center>No organizers found</center></td>
                                    </tr>

                                    @else
                                        @foreach ($organizers as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>1.2k</td>

                                                <td> <img class="img-rounded" src="{{ asset($value->image) }}"
                                                        style="width: auto; height: 80px; max-width:100%" alt="User Avatar">
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="dropdown-toggle" type="button"
                                                            id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                                            <li><a href="{{ route('view_organizer', $value->id) }}">View</a>
                                                            </li>
                                                            <li><a
                                                                    href="{{ route('edit_organizer', $value->id) }}">Edit</a>
                                                            </li>

                                                            <li><a href="{{ route('delete_organizer', $value->id) }}">Delete</a>
                                                            </li>


                                                        </ul>
                                                    </div>
                                                </td>
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

@section('custom-js')
<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
@endsection

