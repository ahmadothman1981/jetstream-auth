@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-1">
                
            </div>
            <div class="col-md-8">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                           <tr style="background: darkgray;">
                            <td class="col-md-1">
                                <label for="">Date</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">Total</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">Payment</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Invoice</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Order</label>
                            </td>

                            <td class="col-md-1">
                                <label for="">Action</label>
                            </td>
                               
                           </tr> 


                            @foreach($orders as $order)

                             <tr >
                            <td class="col-md-1">
                                <label for="">{{ $order->order_date}}</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">${{ $order->amount }}</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">{{$order->payment_method }}</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">{{$order->invoice_number }}</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">
                                    @if($order->status  == 'Pending')

                                    <span class="badge badge-pill badge-warning" style="background:#800080;">Pending</span>
                                    

                                    @elseif($order->status  == 'confirmed')
    <span class="badge badge-pill badge-warning" style="background:#0000FF;">Confirmed</span>


                                    @elseif($order->status  == 'processing')
    <span class="badge badge-pill badge-warning" style="background:#41FA8B;">Processing</span>


                                    @elseif($order->status  == 'picked')
    <span class="badge badge-pill badge-warning" style="background:#3E4EF0;">Picked</span>


                                    @elseif($order->status  == 'shipped')
    <span class="badge badge-pill badge-warning" style="background:#884EF0;">Shipped</span>

                                    @elseif($order->status  == 'delivered')
    <span class="badge badge-pill badge-warning" style="background:#41FA8B;">Delivered</span>

                                @if($order->return_order == 1)
                                    <span class="badge badge-pill badge-warning" style="background:red ;">Return Requested</span>
                                @endif


                                    @else
    <span class="badge badge-pill badge-warning" style="background:#FF0000;">Cancel</span>


                                    @endif
                                    </label>
                            </td>

                            <td class="col-md-1">
                                <a href="{{ url('user/order_details/'.$order->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>View</a>
                                <a target="_blank" href="{{ url('user/invoice_downlaod/'.$order->id) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i>Invoice</a>
                            </td>
                               
                           </tr> 
                           @endforeach
                        </tbody>
                    </table>
                </div><!--end table-responsive-->



            </div><!--end col-md-8-->




             
        </div><!--end row-->
    </div>
    
</div>




@endsection 