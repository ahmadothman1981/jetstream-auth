@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-bd">
	<div class="container">
<div class="row">
         @include('frontend.common.user_sidebar')
<style>
   

.form {
  background-color: #15172b;
  border-radius: 20px;
  box-sizing: border-box;
  height: 750px;
  padding: 20px;
  width: 320px;
  margin-left:200px;
}

.title {
  color: #eee;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: #eee;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}

.input {
  background-color: #303245;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
}

.cut {
  background-color: #15172b;
  border-radius: 10px;
  height: 20px;
  left: 20px;
  position: absolute;
  top: -20px;
  transform: translateY(0);
  transition: transform 200ms;
  width: 76px;
}

.cut-short {
  width: 50px;
}

.input:focus ~ .cut,
.input:not(:placeholder-shown) ~ .cut {
  transform: translateY(8px);
}

.placeholder {
  color: #65657b;
  font-family: sans-serif;
  left: 20px;
  line-height: 14px;
  pointer-events: none;
  position: absolute;
  transform-origin: 0 50%;
  transition: transform 200ms, color 200ms;
  top: 20px;
}

.input:focus ~ .placeholder,
.input:not(:placeholder-shown) ~ .placeholder {
  transform: translateY(-30px) translateX(10px) scale(0.75);
}

.input:not(:placeholder-shown) ~ .placeholder {
  color: #808097;
}

.input:focus ~ .placeholder {
  color: #dc2f55;
}

.submit {
  background-color: #08d;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 150px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

</style>
 <div class="col-md-8">
    <form id="contact-form" method="POST" action="{{ route('store-ticket') }}" enctype="multipart/form-data">
    @csrf
        <div class="form">
      <div class="title">Welcome</div>
      <div class="subtitle">Apply Ticket</div>
      <div class="input-container ic1">
        <input id="firstname" class="input" type="text" name="title" required placeholder=" " />
        <div class="cut"></div>
        <label for="firstname" class="placeholder">Title</label>
      </div>
      <div class="input-container ic2">
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
      <div class="input-container ic2">
       <h5>Insert Picture <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="file" name="picture" class="form-control" onchange="mainThamUrl(this)" required="">
                    @error('picture') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror<img src="" id="mainThamb">
      </div>
       <div class="input-container ic1">
        <label for="message">Message</label>
        <textarea name="message" class="form-control" rows="5" required></textarea>
      </div>
      <button type="text" class="submit">submit</button>
    </div>
   </form>
</div>
   </div><!--end col-md-8-->
   </div><!--end row-->
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