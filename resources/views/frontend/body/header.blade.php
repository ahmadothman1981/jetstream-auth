<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account">
          <ul class="list-unstyled">
            <li><a href="{{ route('dashboard') }}"><i class="icon fa fa-user"></i>
                {{ __('translation.My Account') }} </a></li>
            <li><a href="{{ route('whishlist') }}"><i class="icon fa fa-heart"></i>{{ __('translation.Wishlist') }}</a></li>
            <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>{{ __('translation.My Cart') }}</a></li>
            <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>{{ __('translation.Checkout') }}</a></li>
            <li><a href="" type="button" data-toggle="modal" data-target="#ordertracking"><i class="icon fa fa-check"></i>{{ __('translation.Order Tracking') }}</a></li>
          <li>
    @auth
   <a href="{{ route('login') }}"><i class="icon fa fa-user"></i>{{ __('translation.My User Profile') }}</a>
    @else
    <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>{{ __('translation.Login/Register') }}</a>
    @endauth
            </li>
            
          </ul>
        </div>
        <!-- /.cnt-account -->
        
        <div class="cnt-block">
          <ul class="list-unstyled list-inline">
            
            <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                 {{ __('translation.Language') }}</span><b class="caret"></b></a>
              <ul class="dropdown-menu">
               
                <li><a href="{{ route('language.converter','en') }}">English</a></li>
               
                <li><a href="{{ route('language.converter','ar') }}">Arabic</a></li>
              
              </ul>
            </li>
          </ul>
          <!-- /.list-unstyled --> 
        </div>
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 



            @php
                $setting = App\Models\SiteSetting::find(1);
            @endphp







          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="{{ url('/') }}"> <img src="{{ asset($setting->logo) }}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form action="{{ route('product.search') }}" method="post">
              @csrf
              
              <div class="control-group">
                <ul class="categories-filter animate-dropdown">
                  <li class="dropdown"> <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">{{ __('translation.Categories') }} <b class="caret"></b></a>
                    
                  </li>
                </ul>
      <input class="search-field" id="search" onfocus="search_result_show()" onblur="search_result_hide()" name="search" placeholder="{{ __('translation.Search here...') }}" />
                <button  class="search-button" type="submit" ></button> </div>
            </form>

            <div id="searchProducts"></div>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
              <div class="total-price-basket"> <span class="lbl">{{ __('translation.Add to cart') }} -</span> <span class="total-price"> <span class="sign">$</span><span class="value" id="cartSubTotal"></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>
               
<!-- =====================  MINI CART START WITH AJAX =============== -->
              <div id="miniCART">


              </div>

<!-- =====================  MINI CART END WITH AJAX =============== -->

                <div class="clearfix cart-total">
                  <div class="pull-right"> <span class="text">{{ __('translation.Sub Total') }} :</span><span class='price' id="cartSubTotal"></span> </div>
                  <div class="clearfix"></div>
                  <a href="{{ route('checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">{{ __('translation.Checkout') }}</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                     {{ __('translation.Home') }}
                </a> </li>

                <!--//get categories Table data  -->

              @php
              $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
              @endphp

              @foreach($categories as $category)
                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
@if(session()->get('locale') == 'ar' )  {{$category->category_name_ar  }}  
@else {{$category->category_name_en  }} 
@endif
                  </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">


<!--//get categories Table data  -->
               @php
          $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
              @endphp 

              @foreach($subcategories as $subcategory)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
      <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">                      
                          <h2 class="title">
@if(session()->get('locale') == 'ar' )  {{ $subcategory->subcategory_name_ar }}  
@else {{ $subcategory->subcategory_name_en }} 
@endif
                            </h2></a>



              @php
          $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
              @endphp 
              @foreach($subsubcategories as $subsubcategory)
                            <ul class="links">
                            <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">
@if(session()->get('locale') == 'ar' ) {{$subsubcategory->subsubcategory_name_ar }} @else {{$subsubcategory->subsubcategory_name_en }}
 @endif
                              </a></li>
                              
                            </ul>
              @endforeach<!-- end subsubcategory foreach -->              
                          </div>
                          <!-- /.col -->
          @endforeach<!-- end subcategory foreach -->
                          <!-- /.col -->
                          
                          <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
          @endforeach<!-- end category foreach -->

            <li > <a href="{{ route('shop.page') }}">  {{ __('translation.Shop') }}</a> </li>

                <li class="dropdown  navbar-right special-menu"> <a href="#">{{ __('translation.Todays offer') }}</a> </li>

                <li class="dropdown  navbar-right special-menu" > <a href="{{ route('home.blog') }}">{{ __('translation.Blog') }}</a> </li>
              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 



  <!-- Order Tracking Modal -->
<div class="modal fade" id="ordertracking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('translation.Track Your Order') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('order.tracking') }}" method="post">
          @csrf
          <div class="modal-body">
            <label>{{ __('translation.Invoice Code') }}</label>
            <input type="text" name="code" required="" class="form-control" placeholder="{{ __('translation.Your Order Invoice Number') }}"  >
            <button class="btn btn-danger" type="submit" style="margin-top: 5px;">{{ __('translation.Track Now') }}</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

  
</header>
<style>
  .search-area {
    position:relative;
  }

  #searchProducts {
    position:absolute;
    top:100%;
    left:0;
    width:100%;
    background:white;
    z-index:999;
    border-radius: 8px;
    margin-top:5px;
  }
</style>

<script type="text/javascript">
  
  function search_result_show()
  {
     $("#searchProducts").slideDown();
  }

  function search_result_hide()
  {
    $("#searchProducts").slideUp();
  }
</script>