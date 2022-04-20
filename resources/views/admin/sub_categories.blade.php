@extends('layouts.admin.template')
@section('title', 'Sub-Categories')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub-Categories</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">

                                <a href="{{ url('admin/create_sub_category') }}"><button type="button"
                                        class="btn btn-primary pull-right">Add Sub-Category</button></a>
                                <br> <br>
                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <p><strong>Errors!</strong>
                                        @foreach ($errors->all() as $error)
                                        {{ $error }}
                                        @endforeach
                                    </p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <strong>Success!</strong> {{ Session::get('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                @if (Session::has('error'))
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <strong>Error!</strong> {{ Session::get('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif

                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Sub Category Name</th>
                                        <th>Parent Category</th>
                                        <th> </th>
                                    </tr>
                                    @if (count($eventBridgeSubCategory)==0)
                                        No sub categories found!
                                    @else
                                    @foreach ($eventBridgeSubCategory as $key=>$eventBridgeSubCateg )
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$eventBridgeSubCateg->event_sub_category_id}}</td>
                                        <td>{{$eventBridgeSubCateg->getEventCategory->name}}</td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle" type="button"
                                                    id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    Actions
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                                    <li><a href="{{ route('edit_sub_category', $eventBridgeSubCateg->id) }}">Edit</a></li>
                                                    <li><a href="{{route('delete_sub_category', $eventBridgeSubCateg->id)}}">Delete</a></li>
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
