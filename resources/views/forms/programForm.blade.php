<div class="col-md-12">
	<div class="form-group">
		<div class="checkbox">
			<label>
				{!!Form::checkbox('is_spanish', 1)!!}  Is Spanish
			</label>
		</div>
	</div>
</div>

<div class="form-group">
	<div class="col-md-6">
		{!! Form::label('titleStrong', 'Main Title') !!}
		{!! Form::text('titleStrong', null, ['class' => 'form-control']) !!}
	</div>
	<div class="col-md-6">
		{!! Form::label('title', 'Title') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		{!! Form::label('secondHead', 'Second Header') !!}
		{!! Form::text('secondHead', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet1', 'Bullet Point 1') !!}
		{!! Form::text('bullet1', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet2', 'Bullet Point 2') !!}
		{!! Form::text('bullet2', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet3', 'Bullet Point 3') !!}
		{!! Form::text('bullet3', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet4', 'Bullet Point 4') !!}
		{!! Form::text('bullet4', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet5', 'Bullet Point 5') !!}
		{!! Form::text('bullet5', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet6', 'Bullet Point 6') !!}
		{!! Form::text('bullet6', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet7', 'Bullet Point 7') !!}
		{!! Form::text('bullet7', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet8', 'Bullet Point 8') !!}
		{!! Form::text('bullet8', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet9', 'Bullet Point 9') !!}
		{!! Form::text('bullet9', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet10', 'Bullet Point 10') !!}
		{!! Form::text('bullet10', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('bullet11', 'Bullet Point 11') !!}
		{!! Form::text('bullet11', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('disclaimerAdd', 'Disclaimer Addition') !!}
		{!! Form::text('disclaimerAdd', null, ['class' => 'form-control']) !!}
	</div>

	@if (isset($program))
		<div class="form-group">
			<div class="dropzone" id="dropzoneFileUpload"></div>
		</div>
	@endif

</div>
