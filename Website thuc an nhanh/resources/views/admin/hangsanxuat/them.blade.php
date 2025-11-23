@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Thêm Nhà cung cấp</div>
            <div class="card-body">
                <form action="{{ route('admin.hangsanxuat.them') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên hãng</label>
                        <input type="text" class="form-control @error('tenhang') is-invalid @enderror" name="tenhang" required />
                        @error('tenhang') 
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div> 
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="hinhanh">Hình ảnh</label>
                        <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" />
                        @error('hinhanh')
                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Thêm vào CSDL</button>
                </form>
            </div>
        </div>
    </div>
@endsection