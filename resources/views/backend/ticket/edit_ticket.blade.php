@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
  
	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			

			
			

			
			<!-- /.col -->
			<! Ticket Replay-->
				  <div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Ticket Replay </h3>
		  <div id="success-message" class="d-none alert alert-success mt-3"></div>
		<div id="error-message" class="d-none alert alert-danger mt-3"></div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">

 <div class="form-group">
 	<div class="row">
 		<div class="col-md-8">
		<h6 ><span style="font-weight: bold; color: seagreen;">Ticket Number:</span> {{ $ticket->ticket_id  }}  <span class="text-danger">*</span></h6>
		<h6><span style="font-weight: bold; color: seagreen;">Ticket Title:</span>{{ $ticket->title  }} <span class="text-danger">*</span></h6>
		<h6><span style="font-weight: bold; color: seagreen;"> Ticket User Name: </span>{{ $ticket->user->name }}  <span class="text-danger">*</span></h6>
	</div>
	<div class="col-md-4">
		<a  target="_blank" href="{{ asset($ticket->picture) }}"><img src="{{ asset($ticket->picture) }}" width="100px"></a>
	</div>
	</div>
		<p ><span style="font-weight: bold; color: seagreen;">Ticket Original Message:</span>{{ $ticket->message }}</p>
		@foreach($comments as $comment)

		@if(Auth::guard('admin')->user()->id == $comment->user_id)
			<p><span style="font-weight: bold; color: seagreen;"> Admin Message:</span>{{ $comment->comment }}</p>
			@if($comment->picture == null)
			@else
			<a  target="_blank" href="{{route('picture.download',$comment->id) }}" >download<img src="{{ asset($comment->picture) }}" width="100px"></a>
			@endif
		@else
			<p><span style="font-weight: bold; color: seagreen;"> User Message:</span>{{ $comment->comment }}</p>
			@if($comment->picture == null)
			@else
			<a  target="_blank" href="{{route('picture.download',$comment->id) }}" >download<img src="{{ asset($comment->picture) }}" width="100px"></a>
			
			@endif
		
		@endif
		@endforeach
		<div id="new">
		
		</div>

	</div>

 <form method="post" id="admin_form" action="{{route('add-comment')}}" enctype="multipart/form-data" >
	 	@csrf
			
			<input type="hidden" id="ticket_id" name="ticket_id" value="{{ $ticket->id }}">
			<input type="hidden" id="user_id" name="user_id" value="{{ $ticket->user_id }}">		   



	<div class="form-group">
	<h5> Replay  <span class="text-danger">*</span></h5>	
		<div class="controls">

	 <textarea id="textarea" name="comment" class="form-control" rows="5" required></textarea>
	 @error('comment ') 
	 <span class="text-danger">{{ $comment }}</span>
	 @enderror 
	</div>
	</div>
<div class="row">
	<div class="col-md-4">
<div class="form-group" >
    <h5 style="font-weight: bold;"> Insert Image  <span class="text-danger">*</span></h5>    
        <div class="controls">

      <input id="input"  type="file" name="picture" class="form-control" onchange="mainThamUrl(this)" >
                    @error('picture') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror<img src="" id="mainThamb">
    </div>
    </div>
</div>
</div>

	
					 

			 <div class="text-xs-right">
	<input type="submit" id="submit_ticket"  class="btn btn-rounded btn-primary mb-5" value="Replay">					 
						</div>
					</form>




					  
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box --> 
			</div>

 


		  </div>
		
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
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

  <script type="text/javascript">
  	/*
	$(document).ready(function(){		
    $('#admin_comment').submit(function(event){
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response){	
            	var textarea = $('#textarea').val();
            	$('#new').append(`<p><span style="font-weight: bold; color: seagreen;"> Admin Message:</span>${textarea}</p>`)
                $('#admin_comment')[0].reset();
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
        	});//ajax

     	});//submit
	});//ready
	
*/
</script>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>


<script type="text/javascript">
	
	// $('#submit_ticket').on('click', function(event){
	// 	//$('#admin_form').submit(function(){
    //     event.preventDefault();
    //     var formData = new FormData();
    //     var files = $('#input')[0].files[0];
    //     var textarea = $('#textarea').val();
    //     var ticket_id = $('#ticket_id').val();
    //     var user_id = $('#user_id').val();
    //     formData.append('input',files);
    //     formData.append('comment',textarea);
    //     formData.append('ticket_id',ticket_id);
    //     formData.append('user_id',user_id);
    //     console.log(files);
        
    // $.ajax({
    //     type: 'POST',
    //     url:"{{ url('/apply/comment') }}",
    //     data: formData,
    //     contentType: false,
    //     processData: false,
    //     success: function(response) {
        	
    //         $('<img>').attr('src', response.url).appendTo('#images');
    //     }
  	//   });
    // });
//});
//});
// 	$('#submit_ticket').on('click', function(event){
//   //  $('#admin_form').submit(function(event) {
//         event.preventDefault();
//         /* var formData = new FormData();
//         var files = $('#input')[0].files[0];
//         var textarea = $('#textarea').val();
//         var ticket_id = $('#ticket_id').val();
//         var user_id = $('#user_id').val();
//         formData.append('input',files);
//         formData.append('comment',textarea);
//         formData.append('ticket_id',ticket_id);
//         formData.append('user_id',user_id);
// console.log(formData);*/
       
//         // Send an AJAX request to upload the post and picture
//        // $.ajax({
//        //      url:"{{route('add-comment')}}", 
//        //      type:'POST',
//        //      data:formData,
//        //      dataType:"JSON",
//        //      success: function(response) {
//        //           Append the new comment to a div
//        //          var postHtml = 
//        //              '<p>' + data.comment + '</p>' +
//        //              `<img src="'${data.picture}'"`; 
//        //         	$('#new').append(postHtml);
//        //         	console.log(response);
//        //      },
//        //      error: function(xhr, status, error) {
//        //          // Handle errors
//        //      }
//        //  });
// $.ajax({
// 	url:'{{ url('tickets/comment/store') }}',
// 	//data:formData,
// 	type:'POST',
// 	success:function(data){
// 		console.log('hi');
// 	}
// });
//     });


</script>
<script type="text/javascript">
// 	$(document).ready(function() {
//     $('#admin_form').submit(function(event) {
//         event.preventDefault();

//         // Serialize the form data
//         var formData = new FormData($(this)[0]);
// console.log(formData);
//         // Send an AJAX request to upload the post and picture
//         $.ajax({
//             url: $(this).attr('action'),
//             type:'POST', //$(this).attr('method'),
//             data: formData,
//             dataType:'json',
//             cache: false,
//             contentType: false,
//             processData: false,
//             success: function(data) {
//             	console.log(data);
//                 // Append the new post to a div
//                 var postHtml = '<div class="post">' +
//                     '<p>' + data.text + '</p>' +
//                     '<img src="{{ asset('upload/tickets/comments/') }}/' + data.picture + '">' +
//                     '</div>';
//                 $('#new').append(postHtml);
//             },
//             error: function(xhr, status, error) {
//                 // Handle errors
//             }
//         });
//     });
// });
</script>
<script type="text/javascript">
	$(document).ready(function() {
    $('#admin_form').submit(function(event) {
        event.preventDefault();
         var formData = new FormData($(this)[0]);
	console.log(formData);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            //data: formData,
             success: function(response) {
            	console.log(response);
                // Append the new post to a div
                
            },
            error: function(xhr, status, error) {
                // Handle errors
            }
        });
    });
});

</script>

@endsection