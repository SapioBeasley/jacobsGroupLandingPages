<!-- Embedded Video -->
<div id="video_holder" class="col-md-6">

	@if ($program['is_spanish'] == 0)
		<h4>Discover more about us</h4>

		<p>
			When it comes to selling or buying your home, it is important to hire a seasoned team of professionals that specialize in your area. With millions of dollars in closed homes, The Jacobs Team is your foremost authority. If the timing is right for you, we are always a phone call away
		</p>

		<div class="video-block">
			<h4>Our Philosophy</h4>
			<p>
				Any agent can list a home. We believe in truly MARKETING for our clients. We use aggressive, targeted and active marketing that will get you results in a reasonable time.
			</p>
		</div>
	@else
		<h4>Descubre más sobre nosotros</h4>

		<p>
			Cuando se trata de la venta o la compra de su casa, es importante contratar a un experimentado equipo de profesionales que se especializan en su área. Con millones de dólares en ventas, The Jacobs Group es su autoridad principal de bienes raíces. Si el momento es el adecuado para usted, siempre estamos a sólo una llamada telefónica para asistirle.
		</p>

		<div class="video-block">
			<h4>Nuestra Filosofía</h4>
			<p>
				Cualquier agente puede poner su hogar en venta. Creemos en verdadermente hacer publicidad para nuestros clientes. Utilizamos métodos de publicidad agresivos, enfocados y vigentes que le darán resultados en un plazo razonable.
			</p>
		</div>
	@endif
</div>

@if ($program['is_spanish'] == 0)
	<!--  About-2 Text -->
	<div id="about-2-text" class="col-md-6">

		<!--  Quote -->
		<div id="quote_holder">
			<h4>What they say about us!</h4>

			<!-- Rotator Content -->
			<div class="flexslider">
				@include('includes.testimonials')
			</div>   <!-- End Rotator Content -->

		</div>  <!-- End Quote -->

	</div>  <!-- End About-2 Text -->
@else
	<!--  About-2 Text -->
	<div id="about-2-text" class="col-md-6">

		<!--  Quote -->
		<div id="quote_holder">
			<h4>Lo que dicen de nosotros!</h4>

			<!-- Rotator Content -->
			<div class="flexslider">
				@include('includes.testimonialsEsp')
			</div>   <!-- End Rotator Content -->

		</div>  <!-- End Quote -->

	</div>  <!-- End About-2 Text -->
@endif
