<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light" data-pwa="true">
<head>
	<meta charset="utf-8" />
	
	<!-- Viewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />

	<!-- CSRF Token -->
	 <meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<!-- Title -->
	<title>Đăng ký tài khoản | {{ config('app.name', 'FastFood') }}</title>
	
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
	
	<!-- Bootstrap + Theme styles -->
	<link rel="preload" href="{{ asset('public/assets/css/theme.min.css') }}" as="style" />
	<link rel="stylesheet" href="{{ asset('public/assets/css/theme.min.css') }}" id="theme-styles" />
</head>

<!-- Body -->
<body>
	<!-- Page content -->
	<main class="content-wrapper w-100 px-3 ps-lg-5 pe-lg-4 mx-auto" style="max-width:1920px">
		<div class="d-lg-flex">
			<!-- Login form + Footer -->
			<div class="d-flex flex-column min-vh-100 w-100 py-4 mx-auto me-lg-5" style="max-width:416px">
				<!-- Logo -->
				<header class="navbar px-0 pb-4 mt-n2 mt-sm-0 mb-2 mb-md-3 mb-lg-4">
					<a href="{{ route('frontend.home') }}" class="navbar-brand pt-0">
						<span class="d-flex flex-shrink-0 text-primary me-2">
							<img src="{{ asset('/public/assets/img/app-icons/icon-180x180.png') }}" width="40" height="40" alt="Logo" class="me-2">						</span>
						{{ config('app.name', 'FastFood') }}
					</a>
				</header>
				
				<h1 class="h2 mt-auto">Đăng ký tài khoản</h1>
				<div class="nav fs-sm mb-3 mb-lg-4">
					Tôi đã có tài khoản
					<a class="nav-link text-decoration-underline p-0 ms-2" href="{{ route('user.dangnhap') }}">Đăng nhập</a>
				</div>
				
				<!-- Form -->
				<form method="post" action="{{ route('register') }}" class="needs-validation" novalidate>
					@csrf
					<div class="position-relative mb-4">
						<label for="register-email" class="form-label">Họ và tên</label>
						<input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
						<div class="invalid-tooltip bg-transparent py-0">Họ và tên không được bỏ trống!</div>
					</div>
					<div class="position-relative mb-4">
						<label for="register-email" class="form-label">Địa chỉ email</label>
						<input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off" required />
						<div class="invalid-tooltip bg-transparent py-0">Vui lòng nhập địa chỉ email hợp lệ!</div>
					</div>
					<div class="mb-4">
						<label for="register-password" class="form-label">Mật khẩu</label>
						<div class="password-toggle">
							<input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" autocomplete="new-password" minlength="8" placeholder="Tối thiểu 8 ký tự" required />
							<div class="invalid-tooltip bg-transparent py-0">Mật khẩu không đáp ứng đủ tiêu chí yêu cầu!</div>
							<label class="password-toggle-button fs-lg">
								<input type="checkbox" class="btn-check" />
							</label>
						</div>
					</div>
					<div class="mb-4">
						<label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
						<div class="password-toggle">
							<input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" autocomplete="new-password" minlength="8" placeholder="Tối thiểu 8 ký tự" required />
							<div class="invalid-tooltip bg-transparent py-0">Xác nhận mật khẩu không đáp ứng đủ tiêu chí yêu cầu!</div>
							<label class="password-toggle-button fs-lg">
								<input type="checkbox" class="btn-check" />
							</label>
						</div>
					</div>
					<div class="d-flex flex-column gap-2 mb-4">
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="remember" name="remember" />
							<label for="save-pass" class="form-check-label">Lưu mật khẩu</label>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="privacy" name="privacy" required />
							<label for="privacy" class="form-check-label">Tôi đã đọc và chấp nhận <a class="text-dark-emphasis" href="#">Chính sách bảo mật</a></label>
						</div>
					</div>
					<button type="submit" class="btn btn-lg btn-primary w-100">
						Tạo một tài khoản
						<i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
					</button>
				</form>
				
				<!-- Divider -->
				<div class="d-flex align-items-center my-4">
					<hr class="w-100 m-0">
					<span class="text-body-emphasis fw-medium text-nowrap mx-4">hoặc đăng nhập với</span>
					<hr class="w-100 m-0">
				</div>
				
				<!-- Social login -->
				<div class="d-flex flex-column flex-sm-row gap-3 pb-4 mb-3 mb-lg-4">
					<a href="#" class="btn btn-lg btn-outline-secondary w-100 px-2">
						<i class="ci-google ms-1 me-1"></i> Google
					</a>
					<a href="#" class="btn btn-lg btn-outline-secondary w-100 px-2">
						<i class="ci-facebook ms-1 me-1"></i> Facebook
					</a>
					<a href="#" class="btn btn-lg btn-outline-secondary w-100 px-2">
						<i class="ci-apple ms-1 me-1"></i> Apple
					</a>
				</div>
				
				<!-- Footer -->
				<footer class="mt-auto">
					<p class="fs-xs mb-0">
						Bản quyền &copy; bởi <span class="animate-underline"><a class="animate-target text-dark-emphasis text-decoration-none" href="#" target="_blank">{{ config('app.name', 'FastFood') }}</a></span>.
					</p>
				</footer>
			</div>
			
			<!-- Cover image visible on screens > 992px wide (lg breakpoint) -->
			<div class="d-none d-lg-block w-100 py-4 ms-auto" style="max-width:1034px">
				<div class="d-flex flex-column justify-content-end h-100 rounded-5 overflow-hidden">
					<span class="position-absolute top-0 start-0 w-100 h-100 d-none-dark" style="background:linear-gradient(-90deg, #accbee 0%, #e7f0fd 100%)"></span>
					<span class="position-absolute top-0 start-0 w-100 h-100 d-none d-block-dark" style="background:linear-gradient(-90deg, #1b273a 0%, #1f2632 100%)"></span>
					<div class="ratio position-relative z-2" style="--cz-aspect-ratio:calc(1030 / 1032 * 100%)">
						<img src="{{ asset('public/assets/img/cover/cover.png') }}" alt="Girl" />
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<!-- Customizer toggle -->
	<div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4"></div>
	
	<!-- Bootstrap + Theme scripts -->
	<script src="{{ asset('public/assets/js/theme.min.js') }}"></script>
</body>
</html>