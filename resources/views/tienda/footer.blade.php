<footer class="footer">
	<div class="footer_content">
		<div class="container">
			<div class="row">
				<!-- About -->
				<div class="col-lg-4 footer_col">
					<div class="footer_about">
						<div class="footer_logo">
							<a href="{{ route('tienda') }}">
								<div class="d-flex flex-row align-items-center justify-content-start">
									{{-- <div class="footer_logo_icon"><img src="{{ asset('asset/images/logo_2.png') }}" alt=""></div> --}}
									<div>Tria 3D</div>
								</div>
							</a>		
						</div>
						<div class="footer_about_text">
							<p>SERVICIOS DE IMPRESIÓN 3D Empresa de impresión 3D y fabricación de piezas con Impresora 3D</p>
						</div>
					</div>
				</div>

				<!-- Footer Links -->
				<div class="col-lg-4 footer_col">
					<div class="footer_menu">
						<div class="footer_title">Servicios</div>
						<ul class="footer_list">
							<li><p>Diseño 3D</p>
								{{-- <div class="footer_tag_1">online now</div> --}}
							</li>
							<li><p>Impresión</p>
							</li>
							<li><p>Asesoramiento</p>
								{{-- <div class="footer_tag_2">recommended</div> --}}
							</li>
							<li><p>Prototipos</p>
							</li>
							<li><p>Suvenires</p>
							</li>
						</ul>
					</div>
				</div>

				<!-- Footer Contact -->
				<div class="col-lg-4 footer_col">
					<div class="footer_contact">
						<div class="footer_title">Mantente en contacto</div>
						{{-- <div class="newsletter">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" placeholder="Suscríbete a nuestro boletín" required="required">
								<button class="newsletter_button">+</button>
							</form>
						</div> --}}
						<div class="footer_social">
							{{-- <div class="footer_title">Social</div> --}}
							<ul class="footer_social_list d-flex flex-row align-items-start justify-content-start">
								@include('tienda.redes')
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>