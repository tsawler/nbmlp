@if((Session::has('message')) || (Session::has('error')) || (Session::has('status')))
	@if(Session::has('message'))
		<script>
		x = "{!! Session::get('message') !!}";
		new PNotify({
	        icon: false,
	        type: 'success',
	        text: x,
	        nonblock: true,
			nonblock_opacity: .2,
	    });
		</script>
	@endif
	@if (Session::has('error'))
		<script>
		x = "{!! Session::get('error') !!}";
		@if(count($errors) > 0)
			x += "<ul>";
			@foreach($errors->all() as $error)
				x += "<li>{!! $error !!}</li>";
			@endforeach
		@endif
		new PNotify ({
	        icon: false,
	        type: 'info',
	        text: x,
	        nonblock: true,
			nonblock_opacity: .2,
			close: true
	    });
		</script>
	@endif
	@if (Session::has('status'))
		<script>
		x = "{!! Session::get('status') !!}";
		new PNotify ({
	        icon: false,
	        type: 'info',
	        text: x,
	        nonblock: true,
			nonblock_opacity: .2,
			close: true
	    });
		</script>
	@endif
@endif