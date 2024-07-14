@include('frontend.layout.part.nav')
<head>
    <title>Cart</title>
</head>
<section class="container">
    <table class="table m-4">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Products</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Subtotal</th>
                <th scope="col"><i class="fa-solid fa-trash-can"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $carts)
            <tr class="align-items-center">
                <td><img style="height: 50px; width: 50px;" src="{{ asset('storage/images/' . $carts->img) }}" alt=""></td>
                <th scope="row">{{ $carts->item_name }}</th>
                <td>
                    <input type="number" class="form-control w-50 price" value="{{ $carts->item_price }}" min="0" data-id="{{ $carts->id }}">
                </td>
                <td>
                    <input type="number" class="form-control w-25 quantity" value="{{ $carts->quanity }}" min="1" data-id="{{ $carts->id }}">
                </td>
                <td class="subtotal">{{ $carts->item_price * $carts->quanity }}</td>
                <td>
                    <form action="{{ route('remove_cart', $carts->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
<section class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 text-end">
            <h6>Subtotal</h6>
            <h6>Discount</h6>
            <h6>Total</h6>
        </div>
        <div class="col-lg-4 text-end">
            <h6 id="subtotal-sum">0 MMK</h6>
            <h6>0 MMK</h6>
            <h6 id="total-sum">0 MMK</h6>
        </div>
    </div>
    <hr>
    <div class="text-end">
        <a class="btn btn-outline-danger mb-4" href="{{route('order')}}">Proceed To Checkout</a>
    </div>
</section>
<script>
    document.querySelectorAll('.quantity').forEach((input, index) => {
        input.addEventListener('input', function() {
            updateRowSubtotal(index);
        });
    });

    document.querySelectorAll('.price').forEach((input, index) => {
        input.addEventListener('input', function() {
            updateRowSubtotal(index);
        });
    });

    function updateRowSubtotal(index) {
        let price = parseFloat(document.querySelectorAll('.price')[index].value);
        let qty = parseInt(document.querySelectorAll('.quantity')[index].value);
        let subtotal = price * qty;
        document.querySelectorAll('.subtotal')[index].textContent = subtotal;

        updateTotals();

        let cartId = document.querySelectorAll('.quantity')[index].dataset.id;
        updateCart(cartId, qty, price);
    }

    function updateTotals() {
        let subtotals = document.querySelectorAll('.subtotal');
        let subtotalSum = Array.from(subtotals).reduce((sum, subtotal) => sum + parseFloat(subtotal.textContent), 0);

        document.getElementById('subtotal-sum').textContent = subtotalSum + ' MMK';
        document.getElementById('total-sum').textContent = subtotalSum + ' MMK';
    }

    function updateCart(cartId, quantity, price) {
        fetch('{{ route("update_cart_quantity") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: cartId, quantity: quantity, price: price })
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Failed to update cart');
            }
        })
        .catch(error => console.error('Error:', error));
    }

    // Initial calculation on page load
    updateTotals();
</script>
@include('frontend.layout.part.footer')
