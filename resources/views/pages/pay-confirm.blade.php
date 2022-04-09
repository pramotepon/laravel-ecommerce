@extends('pages.layout.layout')

@section('header')
    <h1 class="pt-3 text-center">ยืนยันการชำระเงิน</h1>
@endsection

@section('main')
    <div class="container">
        <form action="{{route('cart.checkout')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row pt-3">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="fname" class="form-label">ชื่อจริง @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror</label>
                        <input type="text" class="form-control" id="fname" name="fname">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="lname" class="form-label">นามสกุล @error('lname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror</label>
                        <input type="text" class="form-control" id="lname" name="lname">
                    </div>
                </div>
            </div>
            <label for="address" class="form-label">ที่อยู่ @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror</label>
            <textarea name="address" id="address" class="form-control" cols="30" rows="10"></textarea>

            <label for="slip_img" class="form-label mt-3">รูปสลิป @error('slip_img')
                <span class="text-danger">{{ $message }}</span>
            @enderror</label>
            <input type="file" class="form-control mb-3" name="slip_img" id="slip_img">

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">วันที่โอน @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                </div>
                <div class="col-6">
                    <label for="time" class="form-label">เวลาที่โอน @error('time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror</label>
                    <input type="time" class="form-control" name="time" id="time">
                </div>
            </div>
            <div class="text-center">

                <input type="submit" class="btn btn-success" value="ยืนยัน">
            </div>
        </form>
    </div>
@endsection


@section('script')
@endsection
