@extends('layouts.app')

@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">

				@include('includes.status')

				<a class="btn btn-primary" style="margin-bottom: 25px" href="{{route('program.ad.manager', $program['slug'])}}">View Programs Ad Manager</a>

				<div class="panel panel-default">
					<div class="panel-heading">Edit Program</div>

					<div class="panel-body">
						{!! Form::model($program, ['route' => ['program.update', $program['id']], 'method' => 'PUT']) !!}

							@include('forms.programForm')

							<div class="col-md-12">
								<div class="form-group">
									{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>

						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection

@section('uploadScript')
	@if (isset($program))
		<script type="text/javascript">
			var baseUrl = "{{ route('program', $program['slug']) }}";
			var token = "{{ Session::getToken() }}";
			Dropzone.autoDiscover = false;
			var myDropzone = new Dropzone("div#dropzoneFileUpload", {
				url: baseUrl + "/upload",
				params: {
					_token: token
				}
			});
			Dropzone.options.myAwesomeDropzone = {
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 200, // MB
				addRemoveLinks: true,
				accept: function(file, done) {

				},
			};
		</script>
	@endif
@endsection
