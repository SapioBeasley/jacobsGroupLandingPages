@extends('layouts.app')

@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">

				@include('includes.status')

				<div class="panel panel-default">
					<div class="panel-heading">Program Ad Manager</div>

					<div class="panel-body">

						@if(! empty($program['ad'][0]))
							{!! Form::model($program, ['route' => ['program.ad.manager.update', $program['slug']], 'method' => 'PUT']) !!}

								@include('forms.adForm')

								<div class="col-md-12">
									<div class="form-group">
										@if ($disableUpdate === 1)
											<div class="alert alert-warning">
												<p><strong>You must upload an image and refresh the page before updating</strong></p>
											</div>
										@else
											{!! Form::submit('Update Ad Details', ['class' => 'btn btn-primary']) !!}
										@endif
									</div>
								</div>

							{!! Form::close() !!}
						@else

							<center>
							{!! Form::model($program, ['route' => ['program.ad.manager.update', $program['slug']], 'method' => 'PUT']) !!}

								<div class="hidden">
									@include('forms.adForm')
								</div>

								<div class="col-md-12">
									<div class="form-group">
										{!! Form::submit('Activate Ad', ['class' => 'btn btn-primary']) !!}
									</div>
								</div>

							{!! Form::close() !!}
							</center>

						@endif
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
				url: baseUrl + "/upload-ad",
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
