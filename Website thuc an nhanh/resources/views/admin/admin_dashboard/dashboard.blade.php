@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h3 class="text-uppercase text-info"><i class="fa-solid fa-gauge-high"></i> Bảng điều khiển FastFood</h3>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3 h-100">
                <div class="card-header">Món ăn đang bán</div>
                <div class="card-body">
                    <h2 class="card-title"><i class="fa-solid fa-burger"></i> {{ $tong_sanpham }}</h2>
                    <p class="card-text">Tổng số món trong menu</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3 h-100">
                <div class="card-header">Khách hàng</div>
                <div class="card-body">
                    <h2 class="card-title"><i class="fa-solid fa-users"></i> {{ $tong_khachhang }}</h2>
                    <p class="card-text">Khách hàng đã đăng ký</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3 h-100">
                <div class="card-header">Tổng đơn hàng</div>
                <div class="card-body">
                    <h2 class="card-title"><i class="fa-solid fa-file-invoice"></i> {{ $tong_donhang }}</h2>
                    <p class="card-text">Đơn hàng trọn đời</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3 h-100">
                <div class="card-header">Tổng doanh thu</div>
                <div class="card-body">
                    <h3 class="card-title"><i class="fa-solid fa-money-bill-wave"></i> {{ number_format($tong_doanhthu) }}đ</h3>
                    <p class="card-text">Tạm tính từ các đơn hàng</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h5 class="mb-0"><i class="fa-solid fa-clock-rotate-left"></i> Đơn hàng mới nhất</h5>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donhang_moi as $dh)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dh->User->name }}</td>
                            <td>{{ $dh->created_at->format('d/m/Y H:i') }}</td>
                            <td><span class="badge bg-info">{{ $dh->TinhTrang->tinhtrang }}</span></td>
                            <td>
                                <a href="{{ route('donhang.sua', ['id' => $dh->id]) }}" class="btn btn-sm btn-outline-primary">Xem chi tiết</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection