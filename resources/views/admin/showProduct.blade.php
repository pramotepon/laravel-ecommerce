<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Product') }}
                </h2>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-danger" href="{{ route('admin.product.index') }}">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-6">
                            <p>ชื่อ : <strong>{{ $product->name }}</strong></p>
                        </div>
                        <div class="col-6">
                            <p>ราคา : <strong>{{ $product->price }}</strong></p>
                        </div>
                    </div>
                    <p>รายละเอียด :</p>
                    <p><strong>{{ $product->detail }}</strong></p>
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                        width="100%">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
