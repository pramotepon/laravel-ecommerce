<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Add Product') }}
                </h2>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-danger" href="{{ route('admin.product.index') }}">กลับ</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="product_img">รูปภาพ : @error('product_img')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>
                        <input type="file" class="form-control" name="product_img" id="product_img">
                        <div class="row pb-2">
                            <div class="col-6 pt-2">
                                <label for="product_name">ชื่อสินค้า : @error('product_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="text" class="form-control" name="product_name" id="product_name"
                                    value="{{ old('product_name') }}" placeholder="ชื่อสินค้า">
                            </div>
                            <div class="col-6 pt-2">
                                <label for="product_price">ราคา : @error('product_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input type="number" class="form-control" name="product_price" id="product_price"
                                    min="0" value="{{ old('product_price', 0) }}">
                            </div>
                        </div>
                        <label for="product_detail">รายละเอียด : @error('product_detail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </label>
                        <textarea class="form-control" rows="5" id="product_detail"
                            name="product_detail">{{ old('product_detail') }}</textarea>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
