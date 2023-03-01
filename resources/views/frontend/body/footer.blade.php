<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">{{ __('translation.Contact Us') }}</h4>
          </div>
          <!-- /.module-heading -->

               @php
                $setting = App\Models\SiteSetting::find(1);
              @endphp




          
          <div class="module-body">
            <ul class="toggle-footer" style="">
              <iframe style="width: 100%;border:3px solid black; height:40%; " src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d27351.31921172197!2d31.327796915625!3d31.028620500000006!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f79d60c05ae879%3A0x7f56784b94343d80!2z2KPZg9in2K_ZitmF2YrYqSBTbWlseQ!5e0!3m2!1sen!2seg!4v1677132718142!5m2!1sen!2seg" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">{{ __('translation.Customer Service') }}</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="{{ route('login') }}" title="Contact us">{{ __('translation.My Account') }}</a></li>
              <li><a href="#" title="About us">{{ __('translation.Order History') }}</a></li>
              <li><a href="#" title="faq">{{ __('translation.FAQ') }}</a></li>
              <li><a href="#" title="Popular Searches">{{ __('translation.Specials') }}</a></li>
              <li class="last"><a href="#" title="Where is my order?">{{ __('translation.Help Center') }}</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">{{ __('translation.Corporation') }}</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a title="Your Account" href="#">{{ __('translation.About us') }}</a></li>
              <li><a title="Information" href="#">{{ __('translation.Customer Service') }}</a></li>
              <li><a title="Addresses" href="#">{{ __('translation.Company') }}</a></li>
              <li><a title="Addresses" href="#">{{ __('translation.Investor Relations') }}</a></li>
              <li class="last"><a title="Orders History" href="#">{{ __('translation.Advanced Search') }}</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-3">
          <div class="module-heading">
            <h4 class="module-title">{{ __('translation.Why Choose Us') }}</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="#" title="About us">{{ __('translation.Shopping Guide') }}</a></li>
              <li><a href="#" title="Blog">{{ __('translation.Blog') }}</a></li>
              <li><a href="#" title="Company">{{ __('translation.Company') }}</a></li>
              <li><a href="#" title="Investor Relations">{{ __('translation.Investor Relations') }}</a></li>
              <li class=" last"><a href="contact-us.html" title="Suppliers">{{ __('translation.Contact Us') }}</a></li>
            </ul>
          </div>

          <!-- /.module-body --> 
        </div>

      </div>

    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding social">
        <ul class="link">
          <li class="fb pull-left"><a target="_blank" rel="nofollow" href=" {{$setting ->facebook  }}" title="Facebook"></a></li>
          <li class="tw pull-left"><a target="_blank" rel="nofollow" href="{{$setting ->twitter  }}" title="Twitter"></a></li>
          <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="https://www.pinterest.com/" title="PInterest"></a></li>
          <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="{{$setting ->linkedin  }}" title="Linkedin"></a></li>
          <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="{{$setting ->youtube  }}" title="Youtube"></a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        <div class="clearfix payment-methods">
          <ul>
            <li><img src="assets/images/payments/1.png" alt=""></li>
            <li><img src="assets/images/payments/2.png" alt=""></li>
            <li><img src="assets/images/payments/3.png" alt=""></li>
            <li><img src="assets/images/payments/4.png" alt=""></li>
            <li><img src="assets/images/payments/5.png" alt=""></li>
          </ul>
        </div>
        <!-- /.payment-methods --> 
      </div>
    </div>
  </div>
</footer>