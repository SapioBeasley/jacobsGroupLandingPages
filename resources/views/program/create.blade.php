@extends('layouts.app')

@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				@if (Session::has('success_message'))
					{{Session::get('success_message')}}
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">Add New Property</div>

					<div class="panel-body">
						{!! Form::open(['route' => ['program.store']]) !!}
							{!! Form::label('streetAddress', 'Address') !!}
							{!! Form::text('streetAddress', null, ['class' => 'form-control']) !!}
							{!! Form::label('city', 'City') !!}
							{!! Form::text('city', null, ['class' => 'form-control']) !!}
							{!! Form::label('state', 'State') !!}
							{!! Form::text('state', null, ['class' => 'form-control']) !!}
							{!! Form::label('zipcode', 'Zipcode') !!}
							{!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
							<div class="dropzone" id="dropzoneFileUpload"></div>
							{!! Form::submit('Create') !!}
						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
