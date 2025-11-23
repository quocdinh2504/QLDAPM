@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Nhà cung cấp</div>
            <div class="card-body table-responsive">
                <p>
                    <a href="{{ route('hangsanxuat.them') }}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Thêm mới</a>
                    
                    <a href="#nhap" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="fa-solid fa-upload"></i> Nhập Excel
                    </a>
                    
                    <a href="{{ route('hangsanxuat.xuat') }}" class="btn btn-warning">
                        <i class="fa-solid fa-download"></i> Xuất Excel
                    </a>
                </p>
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="10%">Hình ảnh</th>
                            <th width="45%">Tên hãng</th>
                            <th width="30%">Tên hãng không dấu</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hangsanxuat as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center"><img src="{{ asset('storage/app/private/'. $value->hinhanh) }}" width="100" class="img-thumbnail" /></td>
                                <td>{{ $value->tenhang }}</td>
                                <td>{{ $value->tenhang_slug }}</td>
                                <td class="text-center"><a href="{{ route('hangsanxuat.sua', ['id' => $value->id]) }}"><i class="fa-solid fa-pen-to-square text-warning"></i></a></td>
                                <td class="text-center"><a href="{{ route('hangsanxuat.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa nhà cung cấp {{ $value->tenhang }} không?')"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <form action="{{ route('hangsanxuat.nhap') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-0">
                            <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
                            <input type="file" class="form-control" id="file_excel" name="file_excel" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Hủy bỏ</button>
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-upload"></i> Nhập dữ liệu</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection