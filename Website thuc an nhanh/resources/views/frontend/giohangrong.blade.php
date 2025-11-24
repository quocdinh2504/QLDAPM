@extends('layouts.frontend')

@section('title', 'Giỏ hàng rỗng')

@section('content')
	<!-- Page content -->
	<main class="content-wrapper d-flex align-items-center justify-content-center">
		<div class="container">
			<section class="text-center py-4 px-2 px-sm-0 my-2 my-md-3 my-lg-4 my-xl-5 mx-auto" style="max-width:636px">
				<div class="pb-4 mb-3 mx-auto" style="max-width:524px">
					<img src="{{ asset('/public/assets/img/app-icons/icon-180x180.png') }}" width="40" height="40" alt="Logo" class="me-2">
				</div>
				<h5 class="mb-2">Giỏ hàng của bạn hiện đang trống!</h5>
				<p class="fs-sm mb-4">Khám phá nhiều mặt hàng của chúng tôi và thêm sản phẩm vào giỏ hàng.</p>
				<a class="btn btn-dark rounded-pill" href="{{ route('frontend.home') }}">Tiếp tục mua sắm</a>
			</section>
		</div>
	</main>
@endsection
