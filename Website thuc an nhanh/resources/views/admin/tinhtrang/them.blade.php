@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Thêm Tình trạng</div>
            <div class="card-body">
                <form action="{{ route('admin.tinhtrang.them') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên tình trạng</label>
                        <input type="text" class="form-control @error('tinhtrang') is-invalid @enderror" name="tinhtrang" required />
                        @error('tinhtrang') <div class="invalid-feedback"><strong>{{ $message }}</strong></div> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
@endsection