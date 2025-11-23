@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Sửa Nhà cung cấp</div>
            <div class="card-body">
                <form action="{{ route('hangsanxuat.sua', ['id' => $hangsanxuat->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên hãng</label>
                        <input type="text" class="form-control @error('tenhang') is-invalid @enderror" name="tenhang" value="{{ $hangsanxuat->tenhang }}" required />
                        @error('tenhang') <div class="invalid-feedback"><strong>{{ $message }}</strong></div> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hình ảnh</label>
                        @if(!empty($hangsanxuat->hinhanh))
                            <img src="{{ asset('storage/' . $hangsanxuat->hinhanh) }}" width="50" class="d-block mb-2" />
                        @endif
                        <input type="file" class="form-control" name="hinhanh" />
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection