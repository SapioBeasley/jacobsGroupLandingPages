<h2> Find out how! </h2>

{!! Form::open(['route' => ['inquire', $program['slug']]], ['class' => 'row', 'method' => 'post']) !!}

	<div id="input_name" class="col-md-12">
		{!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Full Name']) !!}
	</div>

	<div id="input_email" class="col-md-12">
		{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter your email']) !!}
	</div>

	<div id="input_phone" class="col-md-12">
		{!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Phone Number', 'required']) !!}
	</div>

	<!-- Submit Button -->
	<div id="form_register_btn" class="text-center">
		{!! Form::submit('INQUIRE', ['class' => 'btn btn-primary btn-lg', 'id' => 'submit'])!!}
	</div>

{!! Form::close() !!}

<center>
	<h2 style="font-size: 20px;margin-top: 30px;">Give us a call (702)442-0055</h2>
</center>
