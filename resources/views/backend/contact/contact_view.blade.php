@extends('admin.admin_master')
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">View Contact </h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row"><!--start 2nd row-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Name</h5>
                                                    <div class="controls">
                                                        <input type="text" disabled value="{{$contact->name}}" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div><!--end col-md-4-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Email</h5>
                                                    <div class="controls">
                                                        <input type="text" disabled value="{{$contact->email}}" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div><!--end col-md-4-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>phone</h5>
                                                    <div class="controls">
                                                        <input type="text" disabled value="{{$contact->phone}}" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div><!--end col-md-4-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Date</h5>
                                                    <div class="controls">
                                                        <input type="text" disabled value="{{$contact->created_at}}" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div><!--end col-md-4-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Comment</h5>
                                                    <div class="controls">
                                                        <textarea name="" id="" cols="30" disabled class="form-control" rows="10">{{$contact->comment}}</textarea>
                                                    </div>
                                                </div>
                                            </div><!--end col-md-4-->


                                        </div><!--end 2nd row-->
                                        <hr>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

@endsection
