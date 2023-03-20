@extends('frontend.main_master')
@section('content')

@section('title')
My Cart Page
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">{{ __('translation.Home') }}</a></li>
				<li class='active'>{{ __('translation.My Cart') }}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">{{ __('translation.Image') }}</th>
					<th class="cart-description item">{{ __('translation.Product Name') }}</th>
					<th class="cart-product-name item">{{ __('translation.Color') }}</th>
					<th class="cart-edit item">{{ __('translation.Size') }}</th>
					<th class="cart-qty item">{{ __('translation.Quantity') }}</th>
					<th class="cart-sub-total item">{{ __('translation.SubTotal') }}</th>
					<th class="cart-total last-item">{{ __('translation.Remove') }}</th>
				</tr>
			</thead><!-- /thead -->
			<tbody id="cartPage">

				
			</tbody>
		</table>
	</div>
</div>			
<div class="col-md-4 col-sm-12 estimate-ship-tax">
</div>

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	@if(Illuminate\Support\Facades\Session::has('coupon'))

	@else
	
	<table class="table" id="couponField">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">{{ __('translation.Discount Code') }}</span>
					<p>{{ __('translation.Enter your coupon code if you have one') }}..</p>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						
						<div class="form-group">
							<input type="text" class="form-control unicase-form-control text-input" placeholder="{{ __('translation.Your Coupon') }}.."  id="coupon_name">
							
						</div>
						<div class="clearfix pull-right">
							<button type="submit" class="btn-upper btn btn-primary" onclick="applycoupon(); ">{{ __('translation.APPLY COUPON') }}</button>
							
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->

	@endif

</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead id="couponCalField">
			
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						
								
						<div class="cart-checkout-btn pull-right">
							

							<a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">{{ __('translation.PROCCED TO CHEKOUT') }}</a>
							
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->			

</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<br>

@include('frontend.body.brands')
	</div>
















@endsection