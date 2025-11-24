@extends('layouts.frontend')

@section('title', 'Trang chủ')

@section('content')
<!-- Page content -->
	<main class="content-wrapper">
		<!-- Hero slider -->
		<section class="container pt-3 mb-4">
			<div class="row">
				<div class="col-12">
					<div class="position-relative">
						<span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none-dark rtl-flip" style="background:linear-gradient(90deg, #accbee 0%, #e7f0fd 100%)"></span>
						<span class="position-absolute top-0 start-0 w-100 h-100 rounded-5 d-none d-block-dark rtl-flip" style="background:linear-gradient(90deg, #1b273a 0%, #1f2632 100%)"></span>
						<div class="row justify-content-center position-relative z-2">
							<div class="col-12">
								<!-- Binded images (controlled slider) -->
								<div class="swiper user-select-none" id="sliderImages" data-swiper='{ "allowTouchMove": false, "loop": true, "effect": "fade", "fadeEffect": {"crossFade": true}, "autoplay": {"delay": 3000, "disableOnInteraction": false}}'>
									<div class="swiper-wrapper">
										<div class="swiper-slide d-flex justify-content-end">
											<div class="ratio rtl-flip" style="width: 100%; --cz-aspect-ratio:calc(720 / 1920 * 100%)">
												<img src="{{ asset('public/assets/img/slider/04.png') }}" alt="Image" class="w-100 h-100" style="object-fit: cover;"/>
											</div>
										</div>
										<div class="swiper-slide d-flex justify-content-end">
											<div class="ratio rtl-flip" style="width: 100%; --cz-aspect-ratio:calc(720 / 1920 * 100%)">
												<img src="{{ asset('public/assets/img/slider/05.png') }}" alt="Image" class="w-100 h-100" style="object-fit: cover;"/>
											</div>
										</div>
										<div class="swiper-slide d-flex justify-content-end">
											<div class="ratio rtl-flip" style="width: 100%; --cz-aspect-ratio:calc(720 / 1920 * 100%)">
												<img src="{{ asset('public/assets/img/slider/06.png') }}" alt="Image" class="w-100 h-100" style="object-fit: cover;"/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Scrollbar -->
						<div class="row justify-content-center" data-bs-theme="dark">
							<div class="col-xxl-10">
								<div class="position-relative mx-5 mx-xxl-0"><div class="swiper-scrollbar mb-4"></div></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<!-- Brands -->
		<section class="container mb-5 mt-4">
			<div class="d-flex align-items-center mb-4">
				<h2 class="h4 text-uppercase fw-bold mb-0 text-nowrap pe-3">DANH MỤC MÓN ĂN</h2>
				<div class="w-100 border-bottom"></div>
			</div>

			<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-2">
				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/1.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Khuyến mãi">
					</a>
					<div class="mt-2 fw-bold text-center">Ưu Đãi</div>
				</div>				
				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/2.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Món mới">
					</a>
					<div class="mt-2 fw-bold text-center">Món Mới</div>
				</div>
				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/3.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Combo 1 Người">
					</a>
					<div class="mt-2 fw-bold text-center">Combo 1 Người</div>
				</div>
				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/4.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Combo Nhóm">
					</a>
					<div class="mt-2 fw-bold text-center">Combo Nhóm</div>
				</div>

				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/5.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Gà Rán">
					</a>
					<div class="mt-2 fw-bold text-center">Gà Rán</div>
				</div>
				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/6.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Cơm">
					</a>
					<div class="mt-2 fw-bold text-center">Cơm & Burger</div>
				</div>
				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/7.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Thức ăn nhẹ">
					</a>
					<div class="mt-2 fw-bold text-center">Thức Ăn Nhẹ</div>
				</div>
				<div class="col">
					<a href="#" class="category-card d-block overflow-hidden rounded shadow-sm h-80">
						<img src="{{ asset('public/assets/img/brands/8.jpg') }}" class="w-100 h-100 object-fit-cover hover-zoom" alt="Tráng miệng">
					</a>
					<div class="mt-2 fw-bold text-center">Tráng Miệng</div>
				</div>
			</div>
		</section>

		<style>
			.hover-zoom { transition: transform 0.3s ease; }
			.hover-zoom:hover { transform: scale(1.05); }
			
			/* Cấu hình kích thước ảnh */
			.category-card {
				max-width: 220px; /* Giới hạn chiều rộng tối đa của ảnh là 220px */
				margin: 0 auto;   /* Căn giữa ảnh trong cột */
			}
			
			.category-card img {
				aspect-ratio: 1 / 1; /* Ép ảnh về tỉ lệ vuông */
				border-radius: 8px;
			}
		</style>
		
		<!-- Products (Grid) -->
		@foreach($loaisanpham as $lsp)
			<section class="container pt-2 mt-2 mb-3">
				<!-- Heading -->
				<div class="d-flex align-items-center justify-content-between border-bottom pb-3 pb-md-4">
					<h2 class="h3 mb-0">{{ $lsp->tenloai }}</h2>
					<div class="nav ms-3">
						<a class="nav-link animate-underline px-0 py-2" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => $lsp->tenloai_slug]) }}">
							<span class="animate-target">Xem tất cả</span> <i class="ci-chevron-right fs-base ms-1"></i>
						</a>
					</div>
				</div>

				<!-- Product grid -->
				<div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 pt-4">
					<!-- Item -->
					@foreach($lsp->SanPham as $sp)
						<div class="col">
							<div class="product-card animate-underline hover-effect-opacity bg-body rounded">
								<div class="position-relative">
									<div class="position-absolute top-0 end-0 z-2 hover-effect-target opacity-0 mt-3 me-3">
										<div class="d-flex flex-column gap-2">
											<button type="button" class="btn btn-icon btn-secondary animate-pulse d-none d-lg-inline-flex">
												<i class="ci-heart fs-base animate-target"></i>
											</button>
											<button type="button" class="btn btn-icon btn-secondary animate-rotate d-none d-lg-inline-flex">
												<i class="ci-refresh-cw fs-base animate-target"></i>
											</button>
										</div>
									</div>
									<div class="dropdown d-lg-none position-absolute top-0 end-0 z-2 mt-2 me-2">
										<button type="button" class="btn btn-icon btn-sm btn-secondary bg-body" data-bs-toggle="dropdown">
											<i class="ci-more-vertical fs-lg"></i>
										</button>
										<ul class="dropdown-menu dropdown-menu-end fs-xs p-2" style="min-width:auto">
											<li>
												<a class="dropdown-item" href="#"><i class="ci-heart fs-sm ms-n1 me-2"></i> Thêm vào yêu thích</a>
											</li>
											<li>
												<a class="dropdown-item" href="#"><i class="ci-refresh-cw fs-sm ms-n1 me-2"></i> So sánh</a>
											</li>
										</ul>
									</div>
									<a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $lsp->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
										<div class="ratio" style="--cz-aspect-ratio:calc(240 / 258 * 100%)">
											<img src="{{ asset('storage/app/private/' . $sp->hinhanh) }}" />
										</div>
										<span class="badge bg-info position-absolute top-0 start-0 mt-2 ms-2 mt-lg-3 ms-lg-3">Mới</span>
									</a>
								</div>
								<div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
									<div class="d-flex align-items-center gap-2 mb-2">
										<div class="d-flex gap-1 fs-xs">
											<i class="ci-star-filled text-warning"></i>
											<i class="ci-star-filled text-warning"></i>
											<i class="ci-star-filled text-warning"></i>
											<i class="ci-star-filled text-warning"></i>
											<i class="ci-star text-body-tertiary opacity-75"></i>
										</div>
										<span class="text-body-tertiary fs-xs">(123)</span>
									</div>
									<h3 class="pb-1 mb-2">
										<a class="d-block fs-sm fw-medium text-truncate" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $lsp->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
											<span class="animate-target">{{ $sp->tensanpham }}</span>
										</a>
									</h3>
									<div class="d-flex align-items-center justify-content-between">
										<div class="h5 lh-1 mb-0">{{ number_format($sp->dongia, 0, ',', '.') }}<small>đ</small></div>
										<a href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sp->tensanpham_slug]) }}" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2">
											<i class="ci-shopping-cart fs-base animate-target"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</section>
		@endforeach
	</main>
@endsection