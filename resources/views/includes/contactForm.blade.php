<h2> Start Today! </h2>

<!--Change here-->
{!! Form::open(['route' => ['inquire' => $slug]], ['class' => 'row', 'method' => 'post']) !!}

	<div id="input_name" class="col-md-12">
		<input id="name" class="form-control" type="text" name="first_name" placeholder="Full Name">
	</div>

	<div id="input_email" class="col-md-12">
		<input id="email" class="form-control" type="text" name="email" placeholder="Enter your email">
	</div>

	<div id="input_phone" class="col-md-12">
		<input id="phone" class="form-control" type="text" name="phone" placeholder="Phone Number" required>
	</div>

	<!-- Submit Button -->
	<div id="form_register_btn" class="text-center">
		<input class="btn btn-primary btn-lg" type="submit" value="Inquire" id="submit">
	</div>

</form>

<center>
	<h2 style="font-size: 20px;margin-top: 30px;">Give us a call (702)442-0055</h2>
</center>
