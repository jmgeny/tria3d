	<div class="super_container">

		<!-- Header -->
		@include('tienda.header')

		<div class="super_container_inner">
			<div class="super_overlay"></div>

			<!-- Home -->
			<div class="home">
				<!-- Home Slider -->
				<div class="home_slider_container">
					<div class="owl-carousel owl-theme home_slider">
						<!-- Slide -->
						<div class="owl-item">
							<div class="background_image" style="background-image:url({{ asset('imagenes/3dPinter.svg') }})"></div>
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col fill_height">
										<div class="home_container d-flex flex-column align-items-center justify-content-start">
											<div class="home_content">
												{{-- <div class="home_title">Mas Nuevos</div> --}}
												<div class="home_items">
													<div class="row">
														<div class="col-sm-3 offset-lg-1">														
														</div>
														
														<div class="col-sm-3">
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>

					</div>
					{{-- Flechas para mover --}}
					{{-- <div class="home_slider_nav home_slider_nav_prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
					<div class="home_slider_nav home_slider_nav_next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div> --}}

					<!-- Home Slider Dots -->
					
					{{-- <div class="home_slider_dots_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_dots">
										<ul id="home_slider_custom_dots" class="home_slider_custom_dots d-flex flex-row align-items-center justify-content-center">
											<li class="home_slider_custom_dot active">01</li>
											<li class="home_slider_custom_dot">02</li>
											<li class="home_slider_custom_dot">03</li>
											<li class="home_slider_custom_dot">04</li>
										</ul>
									</div>
								</div>
							</div>
						</div>	
					</div> --}}
				</div>
			</div>

			<!-- Products -->
			<div class="products">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<div class="section_title text-center">Popular Bragado Shop</div>
						</div>
					</div>
					<div class="row page_nav_row">
						<div class="col">
							<div class="page_nav">
								<ul class="d-flex flex-row align-items-start justify-content-center">
									<li class="active"><a href="category.html">Mujeres</a></li>
									<li><a href="category.html">Hombres</a></li>
									<li><a href="category.html">Niños</a></li>								
								</ul>
							</div>
						</div>
					</div>

					<div class="row products_row">
					
						<!-- Product -->
						<div class="col-xl-4 col-md-6">
							<div class="product">
								<div class="product_image"><img src="{{ asset('asset/images/product_1.jpg') }}" alt=""></div>
								<div class="product_content">
									<div class="product_info d-flex flex-row align-items-start justify-content-start">
										<div>
											<div>
												<div class="product_name"><a href="product.html">Cool Clothing with Brown Stripes</a></div>
												
											</div>
										</div>
										<div class="ml-auto text-right">
											<div class="product_category">In <a href="category.html">Category</a></div>
											<div class="product_price text-right">$3<span>.99</span></div>
										</div>
									</div>
									<div class="product_buttons">
										<div class="text-right d-flex flex-row align-items-start justify-content-start">										
											<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
												<div><div><img src="{{ asset('asset/images/cart.svg') }}" alt=""><div>+</div></div></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Product -->
					</div>
					<div class="row load_more_row">
						<div class="col">
							<div class="button load_more ml-auto mr-auto"><a href="#">load more</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>