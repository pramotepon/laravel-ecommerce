@extends('pages.layout.layout')

@section('header')
    <h1 class="pt-3 text-center">ตะกร้าสินค้า</h1>
@endsection

@section('main')
    <div class="container" id="order">
        {{-- Order List --}}
        <div class="py-6">
            <div class="mx-auto">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('images/no-img.jpg') }}" alt="" width="100%">
                            </div>
                            <div class="col-md-9">
                                <h3 class="pt-3">Product 2</h3>
                                <p>{{ substr('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet eligendi excepturi nobis! Laborum nemo odit culpa quidem velit omnis animi, adipisci reprehenderit ratione earum, repellat maiores laudantium perspiciatis, iste non.',0,120) }}
                                    .....</p>
                                <p>ราคา <span>123</span> บาท</p>

                                <p>จำนวน : </p>
                                <div class="input-group mb-3 w-25">
                                    <button class="btn btn-default border" type="button" id="button-addon1">-</button>
                                    <input type="number" class="form-control" value="0"
                                        aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <button class="btn btn-default border" type="button" id="button-addon1">+</button>
                                </div>

                                <div class="text-end">
                                    <button class="btn btn-danger">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Order List --}}
    </div>
@endsection


@section('script')
@endsection
