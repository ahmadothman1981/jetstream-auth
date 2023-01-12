@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-5">

                <div class="card">
                    <div class="card-header">
                        <h4>Shipping Details</h4><hr>
                    </div><!--end card-header-->
                    <div class="card-body" style="background: #76A9FA;">
                        <table class="table">
                            <tr>
                                <th>Shipping Name:</th>
                                <th>{{ $order->name }}</th>
                            </tr>


                             <tr>
                                <th>Shipping Email</th>
                                <th>{{ $order->email }}</th>
                            </tr>


                             <tr>
                                <th>Phone</th>
                                <th>{{ $order->phone }}</th>
                            </tr>



                              <tr>
                                <th>Division</th>
                                <th>{{ $order->division->division_name }}</th>
                            </tr>

                              <tr>
                                <th>District</th>
                                <th>{{ $order->district->district_name }}</th>
                            </tr>

                              <tr>
                                <th>State</th>
                                <th>{{ $order->state->state_name }}</th>
                            </tr>

                            <tr>
                                <th>PostCode</th>
                                <th>{{ $order->post_code }}</th>
                            </tr>

                             <tr>
                                <th>Order Date</th>
                                <th>{{ $order->order_date }}</th>
                            </tr>
                        </table>
                    </div><!--end card-body-->
                </div><!--end card-->

            </div><!--end col-md-5-->



             
        </div><!--end row-->
    </div>
    
</div>




@endsection 