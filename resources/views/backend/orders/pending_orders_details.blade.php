@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Order Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Order Details</li>
								
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
		<div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Shipping Details</strong> </h4>
				  </div>
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
				</div>
			  </div>	<!--end col-md-6 col-12-->


			  <div class="col-md-6 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					<h4 class="box-title"><strong>Order Details</strong> </h4>
				  </div>
				   <table class="table">
                            <tr>
                                <th> Name:</th>
                                <th>{{ $order->user->name }}</th>
                            </tr>


                             <tr>
                                <th>Payment Type</th>
                                <th>{{ $order->payment_method }}</th>
                            </tr>


                             <tr>
                                <th>Phone</th>
                                <th>{{ $order->user->phone }}</th>
                            </tr>



                              <tr>
                                <th>Transition ID</th>
                                <th>{{ $order->trsnsition_id }}</th>
                            </tr>

                              <tr>
                                <th>Invoice</th>
                                <th><span class="text-danger">{{ $order->invoice_number }}</span></th>
                            </tr>

                              <tr>
                                <th>Orader Total</th>
                                <th>${{ $order->amount }}</th>
                            </tr>

                            <tr>
                                <th>Order </th>
                                <th> <span class="badge badge-pill badge-warning" style="background:#418DB9 ;">{{$order->status }}</span></th>
                            </tr>

                            <tr>
                                <th>Order </th>
                                <th>

                                @if($order->status == 'Pending')
                                <a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn btn-success" id="confirm">Confirm order</a>

                                @elseif($order->status == 'confirmed')
                                 <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn btn-success" id="processing">Processing order</a>

                                 @elseif($order->status == 'processing')
                                 <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn btn-success" id="picked">Picked order</a>

                                 @elseif($order->status == 'picked')
                                 <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn btn-success" id="shipped">Shipped order</a>

                                 @elseif($order->status == 'shipped')
                                 <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn btn-success" id="delivered">Delivered order</a>

                                  @elseif($order->status == 'delivered')
                                 <a href="{{ route('delivered.cancel',$order->id) }}" class="btn btn-block btn btn-success" id="canceled">Cancel order</a>



                                @endif
                                </th>
                            </tr>

                             
                        </table>
				</div>
			  </div><!--end col-md-6 col-12-->



			  <div class="col-md-12 col-12">
				<div class="box box-bordered border-primary">
				  <div class="box-header with-border">
					
				  </div>
				  <table class="table">
                        <tbody>
                           <tr style="background: black;">
                            <td class="col-md-1">
                                <label for="">Image</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">Product Name</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">Product Color</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Product Size</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">Product Code</label>
                            </td>

                            <td class="col-md-1">
                                <label for=""> Quantity</label>
                            </td>

                            <td class="col-md-1">
                                <label for=""> Price</label>
                            </td>
                           </tr> 


                            @foreach($orderItem as $item)

                             <tr >
                            <td class="col-md-1">
            <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"></label>
                            </td>

                            <td class="col-md-3">
                                <label for="">{{ $item->product->product_name_en }}</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">{{ $item->color }}</label>
                            </td>

                            <td class="col-md-3">
                                <label for="">{{ $item->size }}</label>
                            </td>

                            <td class="col-md-2">
                                <label for="">{{ $item->product->product_code }}
                                   
                                    </label>
                            </td>

                            <td class="col-md-1">
                        <label for="">{{ $item->qty }}</label>
                            </td>

                             <td class="col-md-1">
                        <label for="">${{ $item->price }}  (${{$item->price*$item->qty}})</label>
                            </td>
                               
                           </tr> 
                           @endforeach
                        </tbody>
                    </table>
				</div>
			  </div><!--end col-md-12 col-12-->


			
			

			
 


		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  



@endsection