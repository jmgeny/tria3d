<header class="header">
	<div class="header_overlay"></div>
	<div class="header_content d-flex flex-row align-items-center justify-content-start">
		<div class="logo">
			<a href="{{ route('tienda') }}">
				<div class="d-flex flex-row align-items-center justify-content-start">
					<div><img src="{{ asset('asset/images/logo_1.png') }}" alt=""></div>
					<div>Tri 3D</div>
				</div>
			</a>	
		</div>
		{{-- <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div> --}}
{{-- 		<nav class="main_nav">
			<ul class="d-flex flex-row align-items-start justify-content-start">
				<li class="active"><a href="#">Mujer</a></li>
				<li><a href="#">Hombres</a></li>
				<li><a href="#">Kids</a></li>
				<li><a href="{{ route('admin') }}">Administrador</a></li>					
			</ul>
		</nav> --}}
		<div class="header_right d-flex flex-row align-items-center justify-content-start ml-auto">
			<div class="header_phone d-flex flex-row align-items-center justify-content-start">
				<div class="menu_nav">
					<ul>
						<li>
							<a class="nav-link"	href="{{ route('admin') }}">Administrador</a>
						</li>
					</ul>
				</div>	
			</div>
			<div class="header_phone d-flex flex-row align-items-center justify-content-start">
				<div><div><img src="{{ asset('asset/images/phone.svg') }}" alt="https://www.flaticon.com/authors/freepik"></div></div>
				<div>+54 11 6321-5787</div>
			</div>
		</div>
	</div>
</header>