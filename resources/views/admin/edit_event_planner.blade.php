@extends('layouts.admin.template')
@section('title', 'Edit Event Planner')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Event Planner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('update_event_planner') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Set Distribution in Percentage</label>
                                        <input type="number" class="form-control" required name="distribution" maxlength="2" value="{{$dist->distribution ?  $dist->distribution : ""}}"
                                            placeholder="Enter your distribution">
                                            <input type="hidden" name="organizer_id" value="{{$id}}">
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>




    </section>




@endsection
