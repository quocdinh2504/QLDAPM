@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Quản lý Đơn hàng</div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="15%">Khách hàng</th>
                            <th width="45%">Thông tin giao hàng & Chi tiết</th>
                            <th width="15%">Ngày đặt</th>
                            <th width="10%">Tình trạng</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donhang as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->User->name }}</td>
                                <td>
                                    <span class="d-block">SĐT: <strong>{{ $value->dienthoaigiaohang }}</strong></span>
                                    <span class="d-block">Địa chỉ: <strong>{{ $value->diachigiaohang }}</strong></span>
                                    <hr>
                                    <table class="table table-bordered table-sm mb-0 bg-light">
                                        <thead>
                                            <tr>
                                                <th>Món ăn</th>
                                                <th width="10%">SL</th>
                                                <th width="20%">Đơn giá</th>
                                                <th width="20%">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $tongtien = 0; @endphp
                                            @foreach ($value->DonHang_ChiTiet as $chitiet)
                                                <tr>
                                                    <td>{{ $chitiet->SanPham->tensanpham }}</td>
                                                    <td class="text-center">{{ $chitiet->soluongban }}</td>
                                                    <td class="text-end">{{ number_format($chitiet->dongiaban) }}đ</td>
                                                    <td class="text-end">{{ number_format($chitiet->soluongban * $chitiet->dongiaban) }}đ</td>
                                                </tr>
                                                @php $tongtien += $chitiet->soluongban * $chitiet->dongiaban; @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-end fw-bold">Tổng cộng:</td>
                                                <td class="text-end fw-bold text-danger">{{ number_format($tongtien) }}đ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>{{ $value->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $value->TinhTrang->tinhtrang }}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('donhang.sua', ['id' => $value->id]) }}"><i class="fa-solid fa-pen-to-square text-warning"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('donhang.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')"><i class="fa-solid fa-trash-can text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection