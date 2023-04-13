@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
            <h4><span class="text-danger">*</span>Apply Ticket<span class="text-danger">*</span></h4>
			<div class="row">

				<div class="col-md-6 x-text ">
	<form id="contact-form" method="POST" action="{{ route('store-ticket') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="title" class="form-control" required>
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
    <button type="submit" class="btn btn-primary">Send Message</button>
</form>

<div id="success-message" class="d-none alert alert-success mt-3"></div>
<div id="error-message" class="d-none alert alert-danger mt-3"></div>
	
				</div>
			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
	</div><!-- /.container -->
</div><!-- /.body-content -->

 <script type="text/javascript">
        function mainThamUrl(input)
        {
            if(input.files && input.files[0])
            {
                var reader = new FileReader();
                reader.onload = function(e)
                {
                    $('#mainThamb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        };

    </script>


@endsection