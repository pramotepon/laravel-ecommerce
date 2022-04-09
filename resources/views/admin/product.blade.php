<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Product') }}
                </h2>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-success" href="{{ route('admin.product.add') }}">+ เพิ่มสินค้า</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Img</th>
                                <th scope="col">name</th>
                                <th scope="col">price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $products->firstItem() + $loop->index }}</td>
                                    <td><img src="{{ asset('images/products/' . $product->image) }}"
                                            alt="{{ $product->name }}" width="120px"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <form action="{{ route('admin.product.delete', $product) }}" method="post">
                                            <a href="{{ route('admin.product.show', $product) }}"
                                                class="btn btn-primary">ดู</a>
                                            <a href="{{ route('admin.product.edit', $product) }}"
                                                class="btn btn-warning">แก้ไข</a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
