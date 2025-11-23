@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Tình trạng đơn hàng</div>
            <div class="card-body table-responsive">
                <p><a href="{{ route('admin.tinhtrang.them') }}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Thêm mới</a></p>
                <table class="table table-bordered table-hover table-sm mb-0">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="85%">Tình trạng</th>
                            <th width="5%">Sửa</th>
                            <th width="5%">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tinhtrang as $value)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->tinhtrang }}</td>
                                <td class="text-center"><a href="{{ route('admin.tinhtrang.sua', ['id' => $value->id]) }}"><i class="fa-solid fa-pen-to-square text-warning"></i></a></td>
                                <td class="text-center"><a href="{{ route('admin.tinhtrang.xoa', ['id' => $value->id]) }}" onclick="return confirm('Xóa tình trạng này?')"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection