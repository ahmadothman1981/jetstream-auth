@extends('frontend.main_master')
@section('content')

@section('title')
{{ $blogpost->post_title_en }}
@endsection



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">{{ __('translation.Home') }}</a></li>
				<li class='active'>
				@if(session()->get('locale') == 'ar' )
				 	{{$blogpost->post_title_ar }}
			    @else
				   {{$blogpost->post_title_en }}
				@endif</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{ asset($blogpost->post_image) }}" alt="">
	<h1>@if(session()->get('locale') == 'ar' ) {{$blogpost->post_title_ar }} @else {{$blogpost->post_title_en }}
 @endif</h1>
	
	<span class="date-time">{{ $blogpost->created_at }}</span>
	<p>@if(session()->get('locale') == 'ar' ) {!! $blogpost->post_details_ar !!} @else {!! $blogpost->post_details_en !!}
 @endif</p>
	<div class="social-media">
		<span>{{ __('translation.share post') }}:</span>
		<a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
		<a href="https://www.twitter.com"><i class="fa fa-twitter"></i></a>
		<a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
		<a href="https://www.pinterest.com" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>


				<div class="blog-write-comment outer-bottom-xs outer-top-xs">
	<div class="row">
		<div class="col-md-12">
			<h4>{{ __('translation.Leave A Comment') }}</h4>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputName">{{ __('translation.Your Name') }} <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputEmail1">{{ __('translation.Email Address') }} <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-4">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputTitle">{{ __('translation.Title') }} <span>*</span></label>
			    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="">
			  </div>
			</form>
		</div>
		<div class="col-md-12">
			<form class="register-form" role="form">
				<div class="form-group">
			    <label class="info-title" for="exampleInputComments">{{ __('translation.Your Comments') }} <span>*</span></label>
			    <textarea class="form-control unicase-form-control" id="exampleInputComments" ></textarea>
			  </div>
			</form>
		</div>
		<div class="col-md-12 outer-bottom-small m-t-20">
			<button type="submit" class="btn-upper btn btn-primary checkout-page-button">{{ __('translation.Submit Comment') }}</button>
		</div>
	</div>
</div>
				</div>
				<div class="col-md-3 sidebar">
                
                
                
					<div class="sidebar-module-container">
						<div class="search-area outer-bottom-small">
    <form>
        <div class="control-group">
            <input placeholder="Type to search" class="search-field">
            <a href="#" class="search-button"></a>   
        </div>
    </form>
</div>		

<div class="home-banner outer-top-n outer-bottom-xs">
<img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image">
</div>
				<!-- ==============================================CATEGORY============================================== -->
<div class="sidebar-widget outer-bottom-xs wow fadeInUp">
	<h3 class="section-title">{{ __('translation.Blog Category') }}</h3>
	<div class="sidebar-widget-body m-t-10">
		<div class="accordion">


			@foreach($blogcategory as $category)
			    	<ul class="list-group">
			<a href="{{ url('blog/category/post/'.$category->id) }}"><li class="list-group-item">@if(session()->get('locale') == 'ar' ) {{$category->blog_category_name_ar }} @else {{$category->blog_category_name_en }}
 @endif</li></a>
			
			</ul>
			@endforeach

	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
	<!-- ============================================== CATEGORY : END ============================================== -->						
						<!-- ================ PRODUCT TAGS =============================== -->
   @include('frontend.common.product_tags')>
<!-- ============================================== PRODUCT TAGS : END ============================================== -->					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection

