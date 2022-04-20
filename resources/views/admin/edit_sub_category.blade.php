@extends('layouts.admin.template')
@section('title', 'Edit Sub-Category')
@section('mainBody')

    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Sub-Category</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <form action="{{route('update_sub_category')}}" method="post">
                            @csrf
                            <section class="create-category">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub-Category Name</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Sub-Category Name" required name="subcategory"
                                                value="{{$eventBridgeSubCategory->event_sub_category_id}}">
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Parent Category</label>
                                            <select class="form-control" required name="category">
                                                <option value="{{$eventBridgeSubCategory->event_category_id}}">{{$eventBridgeSubCategory->getEventCategory->name}}</option>
                                              @foreach ($eventCategories as $eventCategory)
                                                <option value="{{$eventCategory->id}}" >{{$eventCategory->name}}</option>
                                              @endforeach>
                                            </select>
                                        </div>
                                        <input type="hidden" name="eventbridgeid" value="{{$eventBridgeSubCategory->id}}">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </section>
                        </form>

                    </div>
                </div>

            </div>


        </div>



    </section>




@endsection
