<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('รายการสั่งซื้อ') }}
                </h2>
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
                                <th scope="col">รูปภาพ</th>
                                <th scope="col">Code</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $orders->firstItem() + $loop->index }}</td>
                                    <td><a href="{{ asset('images/slips/' . $order->image) }}" target="_BLANK"><img
                                                src="{{ asset('images/slips/' . $order->image) }}" alt=""
                                                width="300px"></a></td>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ $order->fname . ' ' . $order->lname }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>
                                        <form action="{{ route('admin.order.update', $order) }}" method="post">
                                            @csrf
                                            <select name="status" id="status" class="form-control">
                                                <option {{ old('status', $order->status) == 1 ? 'selected' : '' }}
                                                    value="1">
                                                    รอการยืนยัน</option>
                                                <option {{ old('status', $order->status) == 2 ? 'selected' : '' }}
                                                    value="2">กำลังจัดส่ง</option>
                                                <option {{ old('status', $order->status) == 3 ? 'selected' : '' }}
                                                    value="3">ล้มเหลว</option>
                                            </select>
                                            <input type="submit" class="btn btn-success w-100" value="ยืนยัน">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
