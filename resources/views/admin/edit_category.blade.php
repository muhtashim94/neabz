@extends('layouts.admin.template')
@section('title', 'Edit Category')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <section class="create-category">
                            <form action="{{route('update_category')}}" method="post">
                            <div class="row">

                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Category Name</label>
                                            <input type="text" class="form-control" value="{{$category->name}}" required placeholder="Enter Your Category Name" name="category">
                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                        </div>
                                    </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>

                        </section>
                    </div>
                </div>

            </div>


        </div>



    </section>




@endsection
