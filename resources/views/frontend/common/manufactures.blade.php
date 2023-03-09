@php
$brand_id = App\Models\Product::groupBy('brand_id')->select('brand_id')->get();

@endphp
<div class="sidebar-widget  wow fadeInUp">
              <div class="widget-header">
                <h4 class="widget-title">{{ __('translation.Manufactures') }}</h4>
              </div>
              <div class="sidebar-widget-body">
                <ul class="list">
                  @if(session()->get('locale') == 'ar' )
                  @foreach($brand_id as $item)
                  <li><a class="item active" href="{{ route('manufactures.product',$item->brand->brand_name_ar) }}">{{$item->brand->brand_name_ar  }}</a></li>
                 @endforeach
                 @else
                 @foreach($brand_id as $item)
                  <li><a class="item active"  href="{{ route('manufactures.product',$item->brand->brand_name_en) }}">{{$item->brand->brand_name_en  }}</a></li>
                 @endforeach 
                 @endif
                </ul>
                <!--<a href="#" class="lnk btn btn-primary">Show Now</a>--> 
              </div>
              <!-- /.sidebar-widget-body --> 
            </div>