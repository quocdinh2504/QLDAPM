@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Thêm người dùng</div>
            <div class="card-body">
                <form action="{{ route('admin.nguoidung.them') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="name" required />
                        @error('name')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required />
                        @error('email')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quyền hạn</label>
                        <select class="form-select" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Mật khẩu mới</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
                        @error('password')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password_confirmation">Xác nhận mật khẩu mới</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required />
                        @error('password_confirmation')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Thêm người dùng</button>
                </form>
            </div>
        </div>
    </div>
@endsection