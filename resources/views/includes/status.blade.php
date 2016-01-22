@if (Session::has('success_message'))
	<div class="alert alert-dismissible alert-success">
		{{-- <button type="button" class="close" data-dismiss="alert">&close;</button> --}}
		<strong>Well done!</strong> {{Session::get('success_message')}}</a>.
	</div>
@endif
