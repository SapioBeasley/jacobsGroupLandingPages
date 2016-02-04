@extends('layouts.app')

@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12">

				@include('includes.status')

				<div class="panel panel-default">
					<div class="panel-heading">Add New Program</div>

					<div class="panel-body">
						{!! Form::open(['route' => ['program.store']]) !!}

							@include('forms.programForm')

							<div class="col-md-12">
								<div class="form-group">
									{!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>

						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
