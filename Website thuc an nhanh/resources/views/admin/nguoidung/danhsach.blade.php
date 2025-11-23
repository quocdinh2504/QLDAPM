@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Quản lý Tài khoản</div>
            <div class="card-body table-responsive">
                <p><a href="{{ route('admin.nguoidung.them') }}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Thêm mới</a></p>
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Họ tên</th>
                            <th width="20%">Tên đăng nhập</th>
                            <th width="35%">Email</th>
                            <th width="10%">Quyền</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nguoidung as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->username }}</td>

                                <td>{{ $value->email }}</td>
                                <td>
                                    @if($value->role == 'admin')
                                        <span class="badge bg-danger">Quản trị viên</span>
                                    @else
                                        <span class="badge bg-secondary">User</span>
                                    @endif
                                </td>
                                <td class="text-center"><a href="{{ route('admin.nguoidung.sua', ['id' => $value->id]) }}"><i class="fa-solid fa-pen-to-square text-warning"></i></a></td>
                                <td class="text-center"><a href="{{ route('admin.nguoidung.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa tài khoản {{ $value->username }} không?')"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection