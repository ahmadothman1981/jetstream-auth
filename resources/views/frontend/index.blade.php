@extends('frontend.main_master')
@section('content')

@section('title')
Easy Online Shop
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        
        <!-- ================================== TOP NAVIGATION ================================== -->
       @include('frontend.common.vertical_menu')
        <!-- ================================== TOP NAVIGATION : END ================================== --> 
        
        <!-- ============================================== HOT DEALS ============================================== -->
        @include('frontend.common.hot_deals')
        <!-- ============================================== HOT DEALS: END ============================================== --> 
        
        <!-- ============================================== SPECIAL OFFER ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">{{ __('translation.Special Offer') }}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">
                  @foreach($special_offer as $product)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
 
@if($lang_code == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif                       </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> {{$product->selling_price }} </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  @endforeach <!-- /end speacial offer foreach --> 
                  
                </div>
              </div>
              
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL OFFER : END ============================================== --> 
        <!-- ============================================== PRODUCT TAGS ============================================== -->
       @include('frontend.common.product_tags')
        <!-- ============================================== PRODUCT TAGS : END ============================================== --> 
        <!-- ============================================== SPECIAL DEALS ============================================== -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">{{ __('translation.Special Deals') }}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

              <div class="item">
                <div class="products special-product">

                  @foreach($special_deals as $product)
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> <img src="{{ asset($product->product_thambnail) }}"  alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif
                          </a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price">  {{$product->selling_price }} </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                @endforeach  <!-- /.end for each  -->
                </div>
              </div>
              
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== SPECIAL DEALS : END ============================================== --> 
        <!-- ============================================== NEWSLETTER ============================================== -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">{{ __('translation.Newsletters') }}</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>{{ __('translation.Sign Up for Our Newsletter!') }}</p>

            <form id="news-form" method="POST" action="{{ route('News.store') }}">
            @csrf
               <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
         </div>
              <button class="btn btn-primary">{{ __('translation.Subscribe') }}</button>
            </form>
            
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 

         @include('frontend.common.colors')

         @include('frontend.common.manufactures')
        <!-- ============================================== NEWSLETTER: END ============================================== --> 
        
        <!-- ============================================== Testimonials============================================== -->
        @include('frontend.common.testimonials')
        
        <!-- ============================================== Testimonials: END ============================================== -->
        
        <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg') }}" alt="Image"> </div>
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ============================================== SIDEBAR : END ============================================== --> 
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

            @foreach($sliders as $slider)
            <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
              <div class="container-fluid">
                <div class="caption bg-color vertical-center text-left">
                  <div class="slider-header fadeInDown-1">{{ __('translation.Top Brands') }}</div>
                  <div class="big-text fadeInDown-1"> {{ $slider->title }} </div>
                  <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description}}</span> </div>
                  <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">{{ __('translation.Shop Now') }}</a> </div>
                </div>
                <!-- /.caption --> 
              </div>
              <!-- /.container-fluid --> 
            </div>
            @endforeach
            <!-- /.item -->
            
           
            <!-- /.item --> 
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">{{ __('translation.money back') }}</h4>
                    </div>
                  </div>
                  <h6 class="text">{{ __('translation.30 Days Money Back Guarantee') }}</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">{{ __('translation.free shipping') }}</h4>
                    </div>
                  </div>
                  <h6 class="text">{{ __('translation.Shipping on orders over $99') }}</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">{{ __('translation.Special Sale') }}</h4>
                    </div>
                  </div>
                  <h6 class="text">{{ __('translation.Extra $5 off on all items') }} </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">{{ __('translation.New Products') }}</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">{{ __('translation.All') }}</a></li>
              @foreach($categories as $category)
              <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">

@if(session()->get('locale') == 'ar' )   {{ $category->category_name_ar }} 
@else {{ $category->category_name_en }} 
@endif
                </a></li>
              @endforeach
             <!-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>

              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">


            @foreach($products as $product)
                  <div class="item item-carousel">

                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
  @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                  <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif

                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
 @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif

                          
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">

                                 <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">{{ __('translation.Add to cart') }}</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
            @endforeach  <!-- end product foreach -->
                  
                  <!-- /.item --> 
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            


            @foreach($categories as $category)
            
            <div class="tab-pane " id="category{{ $category->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
@php
  $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
@endphp

            @forelse($catwiseProduct as $product)
                  <div class="item item-carousel">

                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
  @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif

                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
 @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif

                          
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                
                                <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">{{ __('translation.') }}Add to cart</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->

                  @empty
                  <h5 class="text-danger"> No Product Found</h5>
            @endforelse <!-- /////end product forelse \\\\\-->
                  
                  <!-- /.item --> 
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
        @endforeach <!-- /////end category foreach \\\\\-->
            
            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ============================================== SCROLL TABS : END ============================================== --> 
        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">{{ __('translation.Featured products') }}</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($feature as $product)
            <div class="item item-carousel">

                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
  @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif

                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
 @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif

                          
                          <!-- /.product-price --> 
                          
      </div>
      <!-- /.product-info -->
      <div class="cart clearfix animate-effect">
        <div class="action">
          <ul class="list-unstyled">
            <li class="add-cart-button btn-group">

              <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">{{ __('translation.Add to cart') }}</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
          

            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
          </ul>
        </div>
        <!-- /.action --> 
      </div>
      <!-- /.cart --> 
    </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
        @endforeach<!-- END FOREACH  --> 
            
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
<!-- ============================================== skip_product_0 PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('locale') == 'ar' )   {{ $skip_category_0->category_name_ar }} 
@else {{ $skip_category_0->category_name_en }} 
@endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach( $skip_product_0 as $product)
            <div class="item item-carousel">

                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
  @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif

                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
 @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif

                          
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
               <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
        @endforeach<!-- END FOREACH  --> 
            
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ==============================================skip_product_0 PRODUCTS : END -->



        <!-- ============================================== skip_product_1 PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('locale') == 'ar' )   {{ $skip_category_1->category_name_ar }} 
@else {{ $skip_category_1->category_name_en }} 
@endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach( $skip_product_1 as $product)
            <div class="item item-carousel">

                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
  @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif

                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
 @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif

                          
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
        @endforeach<!-- END FOREACH  --> 
            
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ==============================================skip_product_1 PRODUCTS : END -->


        <!-- ============================================== WIDE PRODUCTS ============================================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">{{ __('translation.New Mens Fashion') }}<br>
              <span class="shopping-needs">{{ __('translation.Save up to 40% off') }}</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">{{ __('translation.NEW') }}</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ============================================== WIDE PRODUCTS : END ============================================== --> 
<!-- ============================================== skip_brand_product_1 PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('locale') == 'ar' )   {{ $skip_brand_1->brand_name_ar }} 
@else {{ $skip_brand_1->brand_name_en }} 
@endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($skip_brand_product_1 as $product)
            <div class="item item-carousel">

                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
  @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif

                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
 @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif

                          
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                 <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
        @endforeach<!-- END FOREACH  --> 
            
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ==============================================skip_brand_product_1 PRODUCTS : END -->




        <!-- ============================================== BEST SELLER ============================================== -->
        
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">{{ __('translation.Best seller') }}</h3>
          <div class="sidebar-widget-body outer-top-xs">
           <!-- <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">-->
              <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                @foreach($top_selling as $product)
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </a> 
                              @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                            </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} ({{ $product->selling_qty }})
@endif</a></h3>
                            <div class="rating rateit-small"></div>
                            @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif
                            <!-- /.product-price --> 
                            
                          </div>

                        </div>
                        <!-- /.col -->

                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                 <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                  </div>
                 
                </div>
              </div>
             @endforeach
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ============================================== BEST SELLER : END ============================================== --> 
        
        <!-- ============================================== BLOG SLIDER ============================================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">{{ __('translation.latest form blog') }}</h3>
          <div class="blog-slider-container outer-top-xs">
           <!-- <div class="owl-carousel blog-slider custom-carousel">-->
               <div class="owl-carousel blog-slider custom-carousel">


                @foreach($blogpost as $blog)
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="{{ route('blog.details',$blog->id) }}"><img src="{{ asset($blog->post_image) }}" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="{{ route('blog.details',$blog->id) }}">@if(session()->get('locale') == 'ar' ) {{$blog->post_title_ar }} @else {{$blog->post_title_en }}
                        @endif</a></h3>

                    <span class="info">{{ $blog->created_at }} </span>

                    <p class="text">@if(session()->get('locale') == 'ar' ) {!! Str::limit($blog->post_details_ar,100) !!} @else {!! Str::limit($blog->post_details_en,100) !!}
                      @endif</p>

                    <a href="{{ route('blog.details',$blog->id) }}" class="lnk btn btn-primary">{{ __('translation.Read more') }}</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
             
              @endforeach

            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== BLOG SLIDER : END ============================================== --> 
        
        <!-- ============================================== FEATURED PRODUCTS ============================================== -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">{{ __('translation.New Arrivals') }}</h3>
          <!--<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">-->
            <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs" >
              @foreach($new_arrival as $product)
    <div class="item item-carousel">
      <div class="products">

        <div class="product">
          <div class="product-image">
            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
            <!-- /.image -->
            
          @php
            $amount = $product->selling_price - $product->discount_price;
            $discount = ($amount/$product->selling_price) * 100;
  @endphp

              <div>
                @if($product->discount_price== NULL)
                 <div class="tag new"><span>new</span></div>
                 @else
                 <div class="tag hot"><span>{{round($discount)}}%</span></div>
                  @endif
              </div>
                        
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">
@if(session()->get('locale') == 'ar' )   {{ $product->product_name_ar }}  
@else  {{ $product->product_name_en }} 
@endif

                           </a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
 @if($product->discount_price== NULL)
       <div class="product-price">
         <span class="price"> {{ $product->selling_price }} </span>
         
        </div>
 @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price}} </span> <span class="price-before-discount"> {{$product->selling_price }}</span> </div>
 @endif

                          
                          <!-- /.product-price --> 
                          
      </div>
      <!-- /.product-info -->
      <div class="cart clearfix animate-effect">
        <div class="action">
          <ul class="list-unstyled">
            <li class="add-cart-button btn-group">

              <button data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
              <button class="btn btn-primary cart-btn" type="button">{{ __('translation.Add to cart') }}</button>
            </li>

           
             <button   id="{{ $product->id }}" onclick="AddToWishList(this.id)" class="btn btn-primary icon" type="button" title="wishlist"> <i class="fa fa-heart"></i> </button> 
          

            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
          </ul>
        </div>
        <!-- /.action --> 
      </div>
      <!-- /.cart --> 
    </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
          
    <!-- /.item -->
            
           @endforeach
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ============================================== FEATURED PRODUCTS : END ============================================== --> 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 

    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
   @include('frontend.body.brands')
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#news-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                $('#news-form')[0].reset();
                $('#success-message').removeClass('d-none').html(response.success);
                $('#error-message').addClass('d-none');
            },
            error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                var errorMessage = '';
                $.each(errors, function(key, value) {
                    errorMessage += value[0] + '<br>';
                });
                $('#success-message').addClass('d-none');
                $('#error-message').removeClass('d-none').html(errorMessage);
            }
        });
    });
});

</script>
@endsection