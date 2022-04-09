@extends('pages.layout.layout')

@section('header')
    <h1 class="text-center pt-3">ตะกร้าสินค้า</h1>
@endsection

@section('main')
    <div class="container" id="order">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- Order List --}}
        <div class="py-6">
            <div class="mx-auto">
                    <a href="{{route('payConfirm.index')}}" class="btn btn-success w-100">Check out ! [ รวม {{$amount}} บาท ]</a>
                    @foreach ($carts as $cart)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('images/products/' . $cart->product->image) }}" alt=""
                                            width="100%">
                                    </div>
                                    <div class="col-md-9">
                                        <h3 class="pt-3">{{ $cart->product->name }}</h3>
                                        <p>{{ substr('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet eligendi excepturi nobis! Laborum nemo odit culpa quidem velit omnis animi, adipisci reprehenderit ratione earum, repellat maiores laudantium perspiciatis, iste non.',0,120) }}
                                            .....</p>
                                        <p>ราคา <span>{{ $cart->product->price }}</span> บาท</p>

                                        <p>จำนวน : {{ $cart->quantity }} รายการ</p>
                                        <form action="{{route('cart.update',$cart)}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="input-group mb-3 w-25">
                                                <input type="number" class="form-control" name="quantity"
                                                    value="{{ $cart->quantity }}" min="1"><button type="submit" class="btn btn-success">update</button>
                                            </div>
                                        </form>

                                        <div class="text-end">
                                            <form action="{{ route('cart.destroy', $cart) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">ยกเลิก</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
        {{-- End Order List --}}
    </div>
@endsection


@section('script')
@endsection
