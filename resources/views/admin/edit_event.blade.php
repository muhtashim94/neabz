@extends('layouts.admin.template')
@section('title', 'Event')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">

                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Fashion</h4>
                                <h4>APR 11</h4>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <img class="img-square" src="{{ asset('assets/dist/img/events-2.jpg') }}"
                                        alt="User Avatar">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


        </div>



    </section>




@endsection
