@extends('layouts.admin.template')
@section('title', 'Event Planners')
@section("custom-css")
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    {{-- <div class="box-header with-border">
                        <h3 class="box-title">Event Planners</h3>
                    </div>
                    <!-- /.box-header --> --}}


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Followers</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th> </th>
                                    </tr>
                                    @if (count($adminOrganizers)==0)

                                    @else
                                        @foreach ($adminOrganizers as $key=> $adminOrganizer)
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>{{$adminOrganizer->name}}</td>
                                            <td>{{$adminOrganizer->totalFollowers}}</td>
                                            {{-- <td>
                                                <div class="form-group">
                                                    @if ($adminOrganizer->soft_del==0)
                                                    <a type="button" href="{{route('isactive_organizer', $adminOrganizer->id)}}" class="btn btn-primary">Active</a>
                                                    @else
                                                    <button type="button" class="btn btn-danger">InActive</button>
                                                    @endif




                                                </div>
                                            </td> --}}
                                            <td>
                                                <input data-id="{{$adminOrganizer->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $adminOrganizer->soft_del ? 'checked' : '' }}>
                                             </td>
                                            <td> <img class="img-circle"
                                                    src="{{ asset($adminOrganizer->image) }}"
                                                    style="width: auto; height: 86px;" alt="User Avatar"></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button"
                                                        id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="true">
                                                        Actions
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                                        <li><a href="{{ route('view_event_planner', $adminOrganizer->id) }}">View</a></li>
                                                        <li><a href="{{ route('edit_event_planner', $adminOrganizer->id) }}">Set Distribution %</a></li>

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



    </section>




@endsection

@section("custom-js")

<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var user_id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/events/delete_organizer',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection
