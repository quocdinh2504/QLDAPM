<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light" data-pwa="true">
<head>
	<meta charset="utf-8" />
	
	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<!-- Title -->
	<title>@yield('title', 'Trang chủ') - {{ config('app.name', 'FastFood') }}</title>
	
	<!-- Favicon / App icons -->
	<link rel="icon" type="image/png" href="{{ asset('public/assets/img/app-icons/hamburger_3075977.png') }}" sizes="32x32" />
	<link rel="apple-touch-icon" href="{{ asset('public/assets/img/app-icons/icon-180x180.png') }}" />
	
	<!-- Theme switcher (color modes) -->
	<script src="{{ asset('public/assets/js/theme-switcher.js') }}"></script>
	
	<!-- Preloaded local web font (Inter) -->
	<link rel="preload" href="{{ asset('public/assets/fonts/inter-variable-latin.woff2') }}" as="font" type="font/woff2" crossorigin />
	
	<!-- Font icons -->
	<link rel="preload" href="{{ asset('public/assets/icons/cartzilla-icons.woff2') }}" as="font" type="font/woff2" crossorigin />
	<link rel="stylesheet" href="{{ asset('public/assets/icons/cartzilla-icons.min.css') }}" />
	
	<!-- Vendor styles -->
	<link rel="stylesheet" href="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/vendor/simplebar/simplebar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('public/assets/vendor/choices.js/choices.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.css') }}" />
	
	<!-- Bootstrap + Theme styles -->
	<link rel="preload" href="{{ asset('public/assets/css/theme.min.css') }}" as="style" />
	<link rel="stylesheet" href="{{ asset('public/assets/css/theme.min.css') }}" id="theme-styles" />

	<!-- Custom CSS  -->
    <style>
        .footer-dark {
            background-color: #212529; /* Màu nền đen xám */
            color: #fff;
            padding-top: 3rem;
            padding-bottom: 1.5rem;
            font-family: 'Inter', sans-serif;
        }
        
        .footer-heading {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 1.25rem;
            color: #ffffff;
            text-transform: capitalize;
        }

        .footer-link {
            display: block;
            color: #adb5bd; /* Màu xám nhạt cho text */
            text-decoration: none;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .footer-link:hover {
            color: #ffffff; /* Hover chuyển sang trắng */
        }

        .app-btn {
            display: inline-block;
            margin-bottom: 10px;
            max-width: 140px;
            width: 100%;
        }
        
        .app-btn img {
            width: 100%;
            border-radius: 5px;
            border: 1px solid #495057;
        }

        .social-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        .social-btn:hover {
            background-color: #e4002b; /* Màu đỏ thương hiệu khi hover */
            color: #fff;
        }

        .copyright-text {
            color: #adb5bd;
            font-size: 0.85rem;
        }
    </style>

	@yield('css')
</head>

<body>
	<!-- Search offcanvas -->
	<div class="offcanvas offcanvas-top" id="searchBox" data-bs-backdrop="static" tabindex="-1">
		<div class="offcanvas-header border-bottom p-0 py-lg-1">
			<form class="container d-flex align-items-center">
				<input type="search" class="form-control form-control-lg fs-lg border-0 rounded-0 py-3 ps-0" placeholder="Bạn muốn tìm gì?" data-autofocus="offcanvas" />
				<button type="reset" class="btn-close fs-lg" data-bs-dismiss="offcanvas"></button>
			</form>
		</div>
		<div class="offcanvas-body px-0">
			<div class="container text-center">
				<img src="{{ asset('public/assets/img/icons/search.svg') }}" class="text-body-tertiary opacity-60 mb-4" alt="Search" />
				<h6 class="mb-2">Kết quả tìm kiếm của bạn sẽ xuất hiện ở đây</h6>
				<p class="fs-sm mb-0">Bắt đầu nhập vào trường tìm kiếm ở trên để xem kết quả tìm kiếm ngay lập tức.</p>
			</div>
		</div>
	</div>
	
	<!-- Shopping cart offcanvas -->
	<div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1" style="width:500px">
		<!-- Header -->
		<div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
			<div class="d-flex align-items-center justify-content-between w-100">
				<h4 class="offcanvas-title" id="shoppingCartLabel">Giỏ hàng (1)</h4>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
			</div>
		</div>
		
		<!-- Items -->
		<div class="offcanvas-body d-flex flex-column gap-4 pt-2">
			<!-- Item -->
			<div class="d-flex align-items-center">
				<a class="flex-sm-shrink-0" href="#" style="width:142px">
					<div class="ratio bg-body-tertiary rounded overflow-hidden" style="--cz-aspect-ratio:calc(110 / 142 * 100%)">
						<img src="{{ asset('public/assets/img/shop/1-mieng-ga-ran.jpg') }}" alt="Thumbnail" />
					</div>
				</a>
				<div class="w-100 min-w-0 ps-3">
					<h5 class="d-flex animate-underline mb-2">
						<a class="d-block fs-sm fw-medium text-truncate animate-target" href="#">1 Miếng Gà Rán</a>
					</h5>
					<div class="d-flex align-items-center justify-content-between gap-1">
						<div class="h6 mt-1 mb-0">35.000Đ</div>
						<button type="button" class="btn btn-icon btn-sm flex-shrink-0 fs-sm" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Xóa khỏi giỏ">
							<i class="ci-trash fs-base"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Footer -->
		<div class="offcanvas-header flex-column align-items-start">
			<div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
				<span class="text-light-emphasis">Tổng tiền:</span>
				<span class="h6 mb-0">$47</span>
			</div>
			<a class="btn btn-lg btn-dark w-100 rounded-pill" href="{{ route('frontend.giohang') }}">Giỏ hàng</a>
		</div>
	</div>
	
	<!-- Navigation bar (Page header) -->
	<header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-fixed px-0" data-sticky-element>
		<div class="container flex-nowrap">
			<!-- Mobile toggler -->
			<button type="button" class="navbar-toggler me-4 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<!-- Navbar brand (Logo) -->
			<a class="navbar-brand py-1 py-md-2 py-xl-1" href="{{ route('frontend.home') }}">
				<span class="d-none d-sm-flex flex-shrink-0 text-primary me-2">
					<img src="{{ asset('/public/assets/img/app-icons/icon-180x180.png') }}" width="40" height="40" alt="Logo" class="me-2">
				</span>
				{{ config('app.name', 'FastFood') }}
			</a>
			
			<!-- Main navigation -->
			<nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1">
				<div class="offcanvas-header py-3">
					<h5 class="offcanvas-title" id="navbarNavLabel">{{ config('app.name', 'FastFood') }}</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
				</div>
				<div class="offcanvas-body pt-3 pb-4 py-lg-0 mx-lg-auto">
					<ul class="navbar-nav position-relative">
						<li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
							<a class="nav-link" href="{{ route('frontend.home') }}"><i class="ci-home me-2"></i>Trang chủ</a>
						</li>
						<li class="nav-item dropdown py-lg-2 me-lg-n1 me-xl-0">
							<a class="nav-link dropdown-toggle" href="{{ route('frontend.sanpham') }}" role="button" data-bs-toggle="dropdown" data-bs-trigger="hover" data-bs-auto-close="outside"><i class="ci-gift me-2"></i>Thực đơn</a>

							<ul class="dropdown-menu" style="--cz-dropdown-spacer:.875rem">
								<li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'ga-ran']) }}">Gà rán</a></li>
								<li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'thuc-an-nhe']) }}">Thức ăn nhẹ</a></li>
							</ul>
						</li>
						<li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
							<a class="nav-link" href="{{ route('frontend.baiviet') }}"><i class="ci-globe me-2"></i>Khuyến mãi</a>
						</li>
						<li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
							<a class="nav-link" href="{{ route('frontend.tuyendung') }}"><i class="ci-target me-2"></i>Dịch vụ tiệc</a>
						</li>
						<li class="nav-item py-lg-2 me-lg-n2 me-xl-0">
							<a class="nav-link" href="{{ route('frontend.lienhe') }}"><i class="ci-chat me-2"></i>Hệ thống nhà hàng</a>
						</li>
					</ul>
				</div>
				<div class="offcanvas-header nav border-top px-0 py-3 mt-3 d-md-none">
					<a class="nav-link justify-content-center w-100" href="{{ route('user.home') }}">
						<i class="ci-user fs-lg opacity-60 ms-n2 me-2"></i>
						Tài khoản
					</a>
				</div>
			</nav>
			
			<!-- Button group -->
			<div class="d-flex align-items-center">
				<!-- Theme switcher (light/dark/auto) -->
				<div class="dropdown">
					<button type="button" class="theme-switcher btn btn-icon btn-lg btn-outline-secondary fs-lg border-0 rounded-circle animate-scale" data-bs-toggle="dropdown">
						<span class="theme-icon-active d-flex animate-target">
							<i class="ci-sun"></i>
						</span>
					</button>
					<ul class="dropdown-menu" style="--cz-dropdown-min-width:9rem">
						<li>
							<button type="button" class="dropdown-item active" data-bs-theme-value="light">
								<span class="theme-icon d-flex fs-base me-2"><i class="ci-sun"></i></span>
								<span class="theme-label">Sáng</span>
								<i class="item-active-indicator ci-check ms-auto"></i>
							</button>
						</li>
						<li>
							<button type="button" class="dropdown-item" data-bs-theme-value="dark">
								<span class="theme-icon d-flex fs-base me-2"><i class="ci-moon"></i></span>
								<span class="theme-label">Tối</span>
								<i class="item-active-indicator ci-check ms-auto"></i>
							</button>
						</li>
						<li>
							<button type="button" class="dropdown-item" data-bs-theme-value="auto">
								<span class="theme-icon d-flex fs-base me-2"><i class="ci-auto"></i></span>
								<span class="theme-label">Tự động</span>
								<i class="item-active-indicator ci-check ms-auto"></i>
							</button>
						</li>
					</ul>
				</div>
				
				<!-- Search toggle button -->
				<button type="button" class="btn btn-icon btn-lg fs-xl btn-outline-secondary border-0 rounded-circle animate-shake" data-bs-toggle="offcanvas" data-bs-target="#searchBox">
					<i class="ci-search animate-target"></i>
				</button>
				
				<!-- Account button visible on screens > 768px wide (md breakpoint) -->
				<a class="btn btn-icon btn-lg fs-lg btn-outline-secondary border-0 rounded-circle animate-shake d-none d-md-inline-flex" href="{{ route('user.home') }}">
					<i class="ci-user animate-target"></i>
					<span class="visually-hidden">Tài khoản</span>
				</a>
				
				<!-- Cart button -->
				<button type="button" class="btn btn-icon btn-lg fs-xl btn-outline-secondary position-relative border-0 rounded-circle animate-scale" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart">
					<span class="position-absolute top-0 start-100 badge fs-xs text-bg-primary rounded-pill mt-1 ms-n4 z-2" style="--cz-badge-padding-y:.25em; --cz-badge-padding-x:.42em">1</span>
					<i class="ci-shopping-bag animate-target me-1"></i>
				</button>
			</div>
		</div>
	</header>
	
	<!-- Page content -->
	@yield('content')
	
	<!-- Page footer -->
	<footer class="footer-dark">
        <div class="container">
            <div class="row">
                <!-- Cột 1: Danh Mục Món Ăn -->
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <h5 class="footer-heading">Danh Mục Món Ăn</h5>
                    <nav class="nav flex-column">
                        <a href="#" class="footer-link">Ưu Đãi</a>
                        <a href="#" class="footer-link">Món Mới</a>
                        <a href="#" class="footer-link">Combo 1 Người</a>
                        <a href="#" class="footer-link">Combo Nhóm</a>
                        <a href="#" class="footer-link">Gà Rán - Gà Quay</a>
                        <a href="#" class="footer-link">Burger - Cơm - Mì Ý</a>
                        <a href="#" class="footer-link">Thức Ăn Nhẹ</a>
                        <a href="#" class="footer-link">Thức Uống & Tráng Miệng</a>
                        <a href="#" class="footer-link">Bảng Thành Phần Dị Ứng</a>
                    </nav>
                </div>

                <!-- Cột 2: Về KFC -->
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <h5 class="footer-heading">Về KFC</h5>
                    <nav class="nav flex-column">
                        <a href="#" class="footer-link">Câu Chuyện Của Chúng Tôi</a>
                        <a href="#" class="footer-link">Tin Khuyến Mãi</a>
                        <a href="#" class="footer-link">Tin tức KFC</a>
                        <a href="#" class="footer-link">Tuyển dụng</a>
                        <a href="#" class="footer-link">Đặt tiệc Sinh nhật</a>
                        <a href="#" class="footer-link">Đơn Lớn Giá Hời</a>
                    </nav>
                </div>

                <!-- Cột 3: Liên hệ KFC -->
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <h5 class="footer-heading">Liên hệ KFC</h5>
                    <nav class="nav flex-column">
                        <a href="#" class="footer-link">Theo dõi đơn hàng</a>
                        <a href="#" class="footer-link">Hệ Thống Nhà Hàng</a>
                        <a href="#" class="footer-link">Liên hệ KFC</a>
                    </nav>
                </div>

                <!-- Cột 4: Chính sách -->
                <div class="col-6 col-md-3 col-lg-2 mb-4">
                    <h5 class="footer-heading">Chính sách</h5>
                    <nav class="nav flex-column">
                        <a href="#" class="footer-link">Chính sách hoạt động</a>
                        <a href="#" class="footer-link">Chính sách và quy định</a>
                        <a href="#" class="footer-link">Chính sách bảo mật thông tin</a>
                    </nav>
                </div>

                <!-- Cột 5: Download App -->
                <div class="col-12 col-lg-4 mb-4">
                    <h5 class="footer-heading">Download App</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <!-- Nút App Store -->
                        <a href="#" class="app-btn">
                            <!-- Lưu ý: Bạn cần thay thế đường dẫn ảnh thật của nút store -->
                            <img src="https://upload.wikimedia.org/wikipedia/commons/3/3c/Download_on_the_App_Store_Badge.svg" alt="Download on App Store">
                        </a>
                        <!-- Nút Google Play -->
                        <a href="#" class="app-btn">
                             <!-- Lưu ý: Bạn cần thay thế đường dẫn ảnh thật của nút store -->
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Get it on Google Play">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Dòng dưới cùng: Copyright & Social Icons -->
            <div class="row align-items-center mt-5 pt-4 border-top border-secondary">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="fs-xs text-center text-lg-start mb-0 order-md-1">
						Bản quyền &copy; bởi <span class="animate-underline"><a class="animate-target text-white-emphasis text-decoration-none" href="#" target="_blank">{{ config('app.name', 'FastFood') }}</a></span>.
					</p>
                </div>
                <div class="d-flex gap-2 gap-sm-3 justify-content-center ms-lg-auto mb-3 mb-md-4 mb-lg-0 order-lg-2">
                   	<div>
						<img src="{{ asset('public/assets/img/payment-methods/visa-light-mode.svg') }}" class="d-none-light" alt="Visa" />
						<img src="{{ asset('public/assets/img/payment-methods/visa-light-mode.svg') }}" class="d-none d-block-light" alt="Visa" />
					</div>
					<div>
						<img src="{{ asset('public/assets/img/payment-methods/paypal-light-mode.svg') }}" class="d-none-light" alt="PayPal" />
						<img src="{{ asset('public/assets/img/payment-methods/paypal-dark-light.svg') }}" class="d-none d-block-light" alt="PayPal" />
					</div>
					<div>
						<img src="{{ asset('public/assets/img/payment-methods/mastercard.svg') }}" alt="Mastercard" />
					</div>
					<div>
						<img src="{{ asset('public/assets/img/payment-methods/google-pay-light-mode.svg') }}" class="d-none-light" alt="Google Pay" />
						<img src="{{ asset('public/assets/img/payment-methods/google-pay-light-mode.svg') }}" class="d-none d-block-light" alt="Google Pay" />
					</div>
					<div>
						<img src="{{ asset('public/assets/img/payment-methods/apple-pay-light-mode.svg') }}" class="d-none-light" alt="Apple Pay" />
						<img src="{{ asset('public/assets/img/payment-methods/apple-pay-light-mode.svg') }}" class="d-none d-block-light" alt="Apple Pay" />
					</div>
                </div>
            </div>
        </div>
    </footer><div class="vr text-body-secondary opacity-25 mx-4 d-none d-md-inline-block order-md-2"></div>
	
	<!-- Back to top button -->
	<div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
		<a class="btn-scroll-top btn btn-sm bg-body border-0 rounded-pill shadow animate-slide-end" href="#top">
			Top
			<i class="ci-arrow-right fs-base ms-1 me-n1 animate-target"></i>
			<span class="position-absolute top-0 start-0 w-100 h-100 border rounded-pill z-0"></span>
			<svg class="position-absolute top-0 start-0 w-100 h-100 z-1" viewBox="0 0 62 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect x=".75" y=".75" width="60.5" height="30.5" rx="15.25" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" />
			</svg>
		</a>
	</div>
	
	@yield('floating-button')
	
	<!-- Vendor scripts -->
	<script src="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/simplebar/simplebar.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/choices.js/choices.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
	<script src="{{ asset('public/assets/vendor/cleave.js/cleave.min.js') }}"></script>
	@yield('javascript')
	
	<!-- Bootstrap + Theme scripts -->
	<script src="{{ asset('public/assets/js/theme.min.js') }}"></script>
</body>
</html>