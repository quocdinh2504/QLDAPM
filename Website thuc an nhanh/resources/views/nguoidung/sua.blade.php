@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Sửa người dùng</div>
            <div class="card-body">
                <form action="{{ route('nguoidung.sua', ['id' => $nguoidung->id]) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" name="name" value="{{ $nguoidung->name }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $nguoidung->email }}" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quyền hạn</label>
                        <select class="form-select" name="role" required>
                            <option value="user" {{ $nguoidung->role == 'user' ? 'selected' : '' }}>Khách hàng</option>
                            <option value="admin" {{ $nguoidung->role == 'admin' ? 'selected' : '' }}>Quản trị viên</option>
                        </select>
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
                        <label class="form-check-label" for="change_password_checkbox">Đổi mật khẩu</label>
                    </div>

                    <div id="change_password_group" style="display: none;">
                        <div class="mb-3">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
            $("#change_password_checkbox").change(function() {
                if ($(this).is(":checked")) {
                    $("#change_password_group").show();
                    $("#change_password_group input").attr("required", "required");
                } else {
                    $("#change_password_group").hide();
                    $("#change_password_group input").removeAttr("required");
                }
            });
        });
    </script>
@endsection