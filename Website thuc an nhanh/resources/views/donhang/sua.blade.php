@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Cập nhật trạng thái đơn hàng</div>
            <div class="card-body">
                <form action="{{ route('donhang.sua', ['id' => $donhang->id]) }}" method="post">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Khách hàng</label>
                        <input type="text" class="form-control" value="{{ $donhang->User->name }}" disabled />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="dienthoaigiaohang">Điện thoại nhận hàng</label>
                        <input type="text" class="form-control" id="dienthoaigiaohang" name="dienthoaigiaohang" value="{{ $donhang->dienthoaigiaohang }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="diachigiaohang">Địa chỉ giao hàng</label>
                        <input type="text" class="form-control" id="diachigiaohang" name="diachigiaohang" value="{{ $donhang->diachigiaohang }}" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="tinhtrang_id">Tình trạng đơn</label>
                        <select class="form-select" id="tinhtrang_id" name="tinhtrang_id" required>
                            @foreach ($tinhtrang as $value)
                                <option value="{{ $value->id }}" {{ ($donhang->tinhtrang_id == $value->id) ? 'selected' : '' }}>{{ $value->tinhtrang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection