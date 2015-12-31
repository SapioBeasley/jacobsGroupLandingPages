@extends('layouts.app')

@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				@if (Session::has('success_message'))
					{{Session::get('success_message')}}
				@endif

				<div class="panel panel-default">
					<div class="panel-heading">Edit Property</div>

					<div class="panel-body">
						{!! Form::model($program, ['route' => ['program.update', $program['id']], 'method' => 'PUT']) !!}
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
							{!! Form::label('disclaimerAdd', 'Disclaimer Addition') !!}
							{!! Form::text('disclaimerAdd', null, ['class' => 'form-control']) !!}
							<div class="dropzone" id="dropzoneFileUpload"></div>
							{!! Form::submit('Update') !!}
						{!! Form::close() !!}
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
