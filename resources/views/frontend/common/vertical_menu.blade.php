 @php
$categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
 @endphp
 <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> {{ __('translation.Categories') }}</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">


        @foreach($categories as $category)
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $category->category_icon }}" aria-hidden="true"></i>
@if(session()->get('locale') == 'ar' )  {{$category->category_name_ar  }}  
@else {{$category->category_name_en  }}
@endif
                </a>
                <ul class="dropdown-menu mega-menu">
                  <li class="yamm-content">
                    <div class="row">
<!--//get categories Table data  -->
               @php
          $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
              @endphp 

              @foreach($subcategories as $subcategory)
                      <div class="col-sm-12 col-md-3">

            <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug_en) }}">   <h2 class="title">
@if(session()->get('locale') == 'ar' )  {{ $subcategory->subcategory_name_ar }}  
@else {{ $subcategory->subcategory_name_en }} 
@endif
                            </h2></a>

              @php
          $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name_en','ASC')->get();
              @endphp 
              @foreach($subsubcategories as $subsubcategory)
                        <ul class="links list-unstyled">
                          <li><a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug_en) }}">
                            
@if(session()->get('locale') == 'ar' ) {{$subsubcategory->subsubcategory_name_ar }} @else {{$subsubcategory->subsubcategory_name_en }}
 @endif
                            
                          </a></li>
                          
                        </ul>
              @endforeach<!-- end subsubcategory foreach -->
                      </div>

               @endforeach<!-- end subcategory foreach -->
                      <!-- /.col -->
         
                      <!-- /.col --> 
                    </div>
                    <!-- /.row --> 
                  </li>
                  <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
        @endforeach <!--End For each CATEGORY -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-heartbeat"></i>{{ __('translation.Health and Beauty') }}</a>
                
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-paper-plane"></i>{{ __('translation.Kids and Babies') }}</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-futbol-o"></i>{{ __('translation.Sports') }}</a> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> 
                <!-- /.dropdown-menu --> 
                <!-- ================================== MEGAMENU VERTICAL ================================== --> </li>
              <!-- /.menu-item -->
              
              <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-envira"></i>{{ __('translation.Home and Garden') }}</a> 
                <!-- /.dropdown-menu --> </li>
              <!-- /.menu-item -->
              
            </ul>
            <!-- /.nav --> 
          </nav>
          <!-- /.megamenu-horizontal --> 
        </div>
        <!-- /.side-menu --> 