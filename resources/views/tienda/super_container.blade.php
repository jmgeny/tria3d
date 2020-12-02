	<div class="super_container">

		<!-- Header -->
		{{-- @include('tienda.header') --}}

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
							</div>	
						</div>
					</div>
				</div>
			</div>

			<!-- Products -->
			<div class="products">
				<div class="container">
					<div class="row products_row">
						<!-- Product -->
						@foreach($products as $product)

						<div class="col-xl-4 col-md-6">
							<div class="product">
								@foreach($product->images as $image)
								<div class="product_image">
									<img src="{{ $image->url }}" alt="">
								</div>
								@endforeach <!-- Imagen -->
								<div class="product_content">
									<div class="product_info d-flex flex-row align-items-start justify-content-start">
										<div>
											<div>
												<div class="product_name">
													<a href="{{ route('product',$product->slug) }}">{{ $product->name }}</a>
												</div>
												
											</div>
										</div>
									</div>
									{{-- <div class="product_buttons">
										<div class="text-right d-flex flex-row align-items-start justify-content-start">										
											<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
												<div><div><img src="{{ asset('asset/images/cart.svg') }}" alt=""><div>+</div></div></div>
											</div>
										</div>
									</div> --}}
								</div>
							</div>
						</div>
						@endforeach<!-- End Product -->
						<!-- Product -->
					</div>
				</div>
			</div>

		</div>

	</div>