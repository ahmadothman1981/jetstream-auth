@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-bd">
	<div class="container">
<div class="row">
         @include('frontend.common.user_sidebar')

  <div class="col-md-2">
              
            </div><!--end col-md-2-->
            
             <div class="col-md-6">
        <div class="card">
                    <h3 style="margin-bottom: 20px" class="text-center"><span class="text-danger">{{ __('translation.Hi') }}...</span><strong>{{ Auth::user()->name }} <span class="text-danger">Apply Ticket</span></strong></h3>
 
                    <div class="card-body">
                         <form id="contact-form" method="POST" action="{{ route('store-ticket') }}" enctype="multipart/form-data">
                            @csrf

                             <div class="form-group">
            <label class="info-title" for="title">Title <span></span></label>
           <input  size="50" class="input" type="text" name="title" required placeholder="Title" />
                            </div>
                 

         <div class="form-group">
            <h5>Category Select <span class="text-danger">*</span></h5>
                <div class="controls">
                <select name="category_id"   class="form-control" required="">
                <option value="" selected="" disabled="" >Select Category</option>
                    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                    @endforeach 
                    </select>
                    @error('category_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
        </div>

        <div class="form-group">
           <h5>Insert Picture <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" name="picture" class="form-control" onchange="mainThamUrl(this)" required="">
                    @error('picture') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror<img src="" id="mainThamb">
      </div>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
        <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-danger">Submit</button>
        </div>
         
                            
                        </form>
                    </div>
                </div>
              
            </div>
         
       </div>
     </div>
   </div>



 <script type="text/javascript">
        function mainThamUrl(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#mainThamb').attr('src',e.target.result).width(50).height(50);
                };
                reader.readAsDataURL(input.files[0]);
            }
        };

    </script>


@endsection


