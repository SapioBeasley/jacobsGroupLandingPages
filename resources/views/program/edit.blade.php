@extends('layouts.app')

@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				@include('includes.status')

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
