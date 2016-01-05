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
							{!! Form::label('titleStrong', 'Main Title') !!}
							{!! Form::text('titleStrong', null, ['class' => 'form-control']) !!}
							{!! Form::label('title', 'Title') !!}
							{!! Form::text('title', null, ['class' => 'form-control']) !!}
							{!! Form::label('secondHead', 'Second Header') !!}
							{!! Form::text('secondHead', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet1', 'Bullet Point 1') !!}
							{!! Form::text('bullet1', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet2', 'Bullet Point 2') !!}
							{!! Form::text('bullet2', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet3', 'Bullet Point 3') !!}
							{!! Form::text('bullet3', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet4', 'Bullet Point 4') !!}
							{!! Form::text('bullet4', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet5', 'Bullet Point 5') !!}
							{!! Form::text('bullet5', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet6', 'Bullet Point 6') !!}
							{!! Form::text('bullet6', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet7', 'Bullet Point 7') !!}
							{!! Form::text('bullet7', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet8', 'Bullet Point 8') !!}
							{!! Form::text('bullet8', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet9', 'Bullet Point 9') !!}
							{!! Form::text('bullet9', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet10', 'Bullet Point 10') !!}
							{!! Form::text('bullet10', null, ['class' => 'form-control']) !!}
							{!! Form::label('bullet11', 'Bullet Point 11') !!}
							{!! Form::text('bullet11', null, ['class' => 'form-control']) !!}
							{!! Form::label('disclaimerAdd', 'Disclaimer Addition') !!}
							{!! Form::text('disclaimerAdd', null, ['class' => 'form-control']) !!}
							@if (isset($program))
								<div class="dropzone" id="dropzoneFileUpload"></div>
							@endif
							{!! Form::submit('Create') !!}
						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
