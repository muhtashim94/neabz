@extends('layouts.admin.template')
@section('title', 'E-Wallet')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">E-Wallet</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <section class="wallet-balance">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="balance">
                                <center>
                                   <h2>$0.00</h2>
                                   <p>Wallet Balance</p>

                                </center>
                            </div>
                            </div>
                        </div>
                    </section>
                    </div>
                </div>

            </div>


        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>



    </section>




@endsection
