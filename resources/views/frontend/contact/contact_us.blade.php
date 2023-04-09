@extends('frontend.main_master')
@section('content')

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="x-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-6 x-text ">
				<form id="contact-form" method="POST" action="{{ route('contact.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
     <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="comment">Message</label>
        <textarea name="comment" class="form-control" rows="5" required></textarea>
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
	$(document).ready(function() {
    $('#contact-form').submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                $('#contact-form')[0].reset();
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