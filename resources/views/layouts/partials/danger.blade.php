@if(Session::has('danger'))
	<div class="alert alert-danger" role="alert">
		{{ Session::get('danger') }}
	</div>
@endif