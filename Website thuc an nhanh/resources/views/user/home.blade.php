@extends('layouts.frontend')

@section('title', 'Hồ sơ khách hàng')

@section('content')
	<!-- Page content -->
	<main class="content-wrapper">
		<nav class="container pt-3 my-3">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="{{ route('user.home') }}">Khách hàng</a></li>
				<li class="breadcrumb-item active">Hồ sơ cá nhân</li>
			</ol>
		</nav>
		
		<div class="container mt-4">
			<div class="row">
				<!-- Sidebar navigation that turns into offcanvas on screens < 992px wide (lg breakpoint) -->
				<aside class="col-lg-3">
					<div class="offcanvas-lg offcanvas-start pe-lg-0 pe-xl-4" id="accountSidebar">
						<!-- Header -->
						<div class="offcanvas-header d-lg-block py-3 p-lg-0">
							<div class="d-flex align-items-center">
								<div class="h5 d-flex justify-content-center align-items-center flex-shrink-0 text-primary bg-primary-subtle lh-1 rounded-circle mb-0" style="width:3rem; height:3rem">S</div>
								<div class="min-w-0 ps-3">
									<h5 class="h6 mb-0">{{ $user->name }}</h5>
									<div class="nav flex-nowrap text-nowrap min-w-0">
										<a class="nav-link animate-underline text-body p-0" href="{{ route('user.home') }}">
												<img src="{{ asset('/public/assets/img/app-icons/icon-180x180.png') }}" width="40" height="40" alt="Logo" class="me-2">
											<span class="text-body fw-normal text-truncate mt-1">Khách hàng thân thiết</span>
										</a>
									</div>
								</div>
							</div>
							<button type="button" class="btn-close d-lg-none" data-bs-dismiss="offcanvas" data-bs-target="#accountSidebar"></button>
						</div>
						<!-- Body (Navigation) -->
						<div class="offcanvas-body d-block pt-2 pt-lg-4 pb-lg-0">
							<nav class="list-group list-group-borderless">
								<a class="list-group-item list-group-item-action d-flex align-items-center pe-none active" href="{{ route('user.hoso') }}">
									<i class="ci-user fs-base opacity-75 me-2"></i> Hồ sơ cá nhân
								</a>
								@if($user->DonHang->count() > 0)
									<a class="list-group-item list-group-item-action d-flex align-items-center" href="{{ route('user.donhang') }}">
										<i class="ci-shopping-bag fs-base opacity-75 me-2"></i> Đơn hàng của tôi
										<span class="badge bg-primary rounded-pill ms-auto">{{ $user->DonHang->count() }}</span>
									</a>
								@else
									<a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
										<i class="ci-shopping-bag fs-base opacity-75 me-2"></i> Đơn hàng của tôi
										<span class="badge bg-primary rounded-pill ms-auto">0</span>
									</a>
								@endif
								<a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
									<i class="ci-heart fs-base opacity-75 me-2"></i> Sản phẩm yêu thích
								</a>
								<a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
									<i class="ci-star fs-base opacity-75 me-2"></i> Đánh giá sản phẩm
								</a>
								<a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
									<i class="ci-map-pin fs-base opacity-75 me-2"></i> Sổ địa chỉ
								</a>
								<a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
									<i class="ci-credit-card fs-base opacity-75 me-2"></i> Phương thức thanh toán
								</a>
								<a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
									<i class="ci-bell fs-base opacity-75 mt-1 me-2"></i> Cài đặt thông báo
								</a>
							</nav>
							<nav class="list-group list-group-borderless pt-3">
								<a class="list-group-item list-group-item-action d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									<i class="ci-log-out fs-base opacity-75 me-2"></i> Đăng xuất
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
									@csrf
								</form>
							</nav>
						</div>
					</div>
				</aside>
				
				<!-- Personal info content -->
				<div class="col-lg-9">
					<div class="ps-lg-3 ps-xl-0">
						<!-- Page title -->
						<h1 class="h2 mb-1 mb-sm-2">Hồ sơ cá nhân</h1>
						<!-- Basic info -->
						<div class="border-bottom py-4">
							@if(session('warning'))
								<div class="alert d-flex alert-danger" role="alert">
									<i class="ci-banned fs-lg pe-1 mt-1 me-2"></i>
									<div>{{ session('warning') }}</div>
								</div>
							@endif
							@if(session('success'))
								<div class="alert d-flex alert-success" role="alert">
									<i class="ci-check-circle fs-lg pe-1 mt-1 me-2"></i>
									<div>{{ session('success') }}</div>
								</div>
							@endif
							<div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
								<h2 class="h6 mb-0">Thông tin cơ bản</h2>
							</div>
							<form action="{{ route('user.hoso') }}" method="post" class="row g-3 g-sm-4 needs-validation" novalidate>
								@csrf
								<div class="col-sm-6">
									<label for="fn" class="form-label">Họ và tên</label>
									<div class="position-relative">
										<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}" required />
										<div class="invalid-feedback">Vui lòng nhập tên đầy đủ của bạn!</div>
									</div>
								</div>
								<div class="col-sm-6">
									<label for="ln" class="form-label">Địa chỉ email</label>
									<div class="position-relative">
										<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email }}" required />
										<div class="invalid-feedback">Vui lòng nhập email của bạn!</div>
									</div>
								</div>
								<div class="col-12">
									<div class="d-flex gap-3 pt-2 pt-sm-0">
										<button type="submit" class="btn btn-primary">Cập nhật hồ sơ</button>
									</div>
								</div>
							</form>
						</div>
						
						<!-- Password -->
						<div class="border-bottom py-4">
							<div class="nav flex-nowrap align-items-center justify-content-between pb-1 mb-3">
								<div class="d-flex align-items-center gap-3 me-4">
									<h2 class="h6 mb-0">Đổi mật khẩu</h2>
								</div>
							</div>
							<form action="{{ route('user.doimatkhau') }}" method="post" class="row g-3 g-sm-4 needs-validation" novalidate>
								@csrf
								<div class="col-sm-6">
									<label for="current-password" class="form-label">Mật khẩu hiện tại</label>
									<div class="password-toggle">
										<input type="password" class="form-control @error('old_password') is-invalid @enderror" id="current-password" name="old_password" placeholder="Nhập mật khẩu hiện tại của bạn" required />
										<label class="password-toggle-button">
											<input type="checkbox" class="btn-check" />
										</label>
									</div>
								</div>
								<div class="col-sm-6">
									<label for="new-password" class="form-label">Mật khẩu mới</label>
									<div class="password-toggle">
										<input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new-password" name="new_password" placeholder="Nhập mật khẩu mới" required />
										<label class="password-toggle-button">
											<input type="checkbox" class="btn-check" />
										</label>
									</div>
								</div>
								<div class="col-12">
									<div class="d-flex gap-3 pt-2 pt-sm-0">
										<button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
									</div>
								</div>
							</form>
						</div>
						
						<!-- Delete account -->
						<div class="pt-3 mt-2 mt-sm-3">
							<h2 class="h6">Xóa tài khoản</h2>
							<p class="fs-sm">Khi bạn xóa tài khoản, hồ sơ công khai của bạn sẽ bị vô hiệu hóa ngay lập tức. Nếu bạn đổi ý trước khi hết 14 ngày, hãy đăng nhập bằng email và mật khẩu, chúng tôi sẽ gửi cho bạn liên kết để kích hoạt lại tài khoản.</p>
							<a class="text-danger fs-sm fw-medium" href="#">Xác nhận xóa tài khoản</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection

@section('floating-button')
	<!-- Sidebar navigation offcanvas toggle that is visible on screens < 992px wide (lg breakpoint) -->
	<button type="button" class="fixed-bottom z-sticky w-100 btn btn-lg btn-dark border-0 border-top border-light border-opacity-10 rounded-0 pb-4 d-lg-none" data-bs-toggle="offcanvas" data-bs-target="#accountSidebar" data-bs-theme="light">
		<i class="ci-sidebar fs-base me-2"></i> Quản lý tài khoản
	</button>
@endsection