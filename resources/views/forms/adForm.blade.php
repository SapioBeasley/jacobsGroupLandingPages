<div class="col-md-6">
	<p><strong>ID </strong><br>
	{{$program['slug']}}
	<p><strong>Item Title </strong><br>
	{{$program['titleStrong']}}
	<p><strong>Destination URL </strong><br>
	{{url('/', $program['slug'])}}
	<p><strong>Item subtitle </strong><br>
	{{$program['title']}}
	<p><strong>Item description </strong><br>
	{{$program['bullet2']}}
	<p><strong>Item category </strong><br>
	real estate
	<p><strong>Contextual keywords </strong><br>
	closing costs;home assistance;buying home;real estate;
</div>

<div class="col-md-6">

	@if (isset($program))
		<div class="form-group">
			<div class="dropzone" id="dropzoneFileUpload"></div>
		</div>
	@endif

	<p><strong>Image URL </strong><br>
	{{$program['ad'][0]['program_ad_image_url']}}
</div>
