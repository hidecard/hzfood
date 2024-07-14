@extends('admin.index')
@section('title', 'Order List')
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Order List Dashboard</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Order List
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <table id="datatablesSimple" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Order Note</th>
                            <th>Order Date</th>
                            <th>Products</th>
                            <th>Quantities</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>Confirm</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->phone }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->order_notes }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>
                                @foreach ($order->orderItems as $item)
                                    {{ $item->item_name }}<br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->orderItems as $item)
                                    {{ $item->quantity }}<br>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->orderItems as $item)
                                    {{ $item->item_price }}<br>
                                @endforeach
                            </td>
                            <td>
                                @php
                                    $totalPrice = 0;
                                    foreach ($order->orderItems as $item) {
                                        $totalPrice += $item->item_price * $item->quantity;
                                    }
                                    echo $totalPrice;
                                @endphp
                            </td>
                            <td>{{ $order->order_status }}</td>
                            <td>
                                @if($order->order_status == 'pending')
                                    <form action="{{ route('admin.orders.confirm', $order->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa-solid fa-user-pen me-1"></i>Confirm
                                        </button>
                                    </form>
                                @endif
                            </td>
                            <td><a href=""><button class="btn btn-danger"><i class="fa-solid fa-trash me-1"></i>Delete</button></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection
