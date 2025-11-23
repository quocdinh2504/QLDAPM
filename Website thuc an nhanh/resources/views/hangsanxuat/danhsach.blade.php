@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Nhà cung cấp</div>
            <div class="card-body table-responsive">
                <p><a href="{{ route('hangsanxuat.them') }}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Thêm mới</a></p>
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
                                <td class="text-center">
                                    @if(!empty($value->hinhanh))
                                        <img src="{{ asset('storage/' . $value->hinhanh) }}" width="50" />
                                    @endif
                                </td>
                                <td>{{ $value->tenhang }}</td>
                                <td>{{ $value->tenhang_slug }}</td>
                                <td class="text-center"><a href="{{ route('hangsanxuat.sua', ['id' => $value->id]) }}"><i class="fa-solid fa-pen-to-square text-warning"></i></a></td>
                                <td class="text-center"><a href="{{ route('hangsanxuat.xoa', ['id' => $value->id]) }}" onclick="return confirm('Xóa hãng này?')"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection