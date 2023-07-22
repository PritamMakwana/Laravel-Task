@extends('include.admin')

@section('title','Payment')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- payment form --}}
    <form action="/charge" method="post" id="payment-form">
        @csrf

        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        <div class="form-row">
            <label for="amount" class="">Amount</label>
            <input type="number" class="form-control mb-2 mt-2" name="amount" id="amount"
                placeholder="Enter amount in USD" required>
        </div>

        <div class="form-row">
            <label for="card-element ">
                Credit or debit card
            </label>
            <div id="card-element" class="form-control mb-3 mt-3">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert" class="text-danger m-3"></div>

        </div>

        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_51NWe4hEX64qUOM5Zkg7fvZs7lP567gdegOftx6I31bhTffTD3dR43tXxjZGdxFXMVLa8qBBoaadvI0f0W4f1IHsF00ufa36Zhh');
        var elements = stripe.elements();

        var card = elements.create('card');
        card.mount('#card-element');

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });

        function stripeTokenHandler(token) {
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    </script>
    {{-- payment form end--}}



    {{-- payments History --}}
    <hr class="my-5" />

    <div class="card">
        <h5 class="card-header">Payments</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Currency</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($charges->data as $charge)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $charge->id }}</td>
                        <td>{{ "$ ".$charge->amount / 100 }}</td>
                        <td>{{ $charge->currency }}</td>
                        <td>{{ $charge->status }}</td>
                        <td>{{ date('d-m-Y | H:i:s A', $charge->created) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- payments History end --}}


</div>
@endsection
