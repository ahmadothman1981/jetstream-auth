@php
$colors_ar = App\Models\Product::groupBy('product_color_ar')->select('product_color_ar')->get();
$colors_en = App\Models\Product::groupBy('product_color_en')->select('product_color_en')->get();

@endphp
<div class="sidebar-widget  wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title" style="font-weight: bold;">{{ __('translation.Colors') }}</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  @if(session()->get('locale') == 'ar' )
                  @foreach($colors_ar as $color)
                  <li><a class="item active" href="{{ route('color.product',$color->product_color_ar) }}">{{  str_replace(',',' ',$color->product_color_ar)  }}</a></li>
                 @endforeach
                 @else
                 @foreach($colors_en as $color)
                  <li><a class="item active"  href="{{ route('color.product',$color->product_color_en) }}">{{  str_replace(',',' ',$color->product_color_en)  }}</a></li>
                 @endforeach 
                 @endif
                </ul>
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>