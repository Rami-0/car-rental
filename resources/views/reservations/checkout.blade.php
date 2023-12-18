<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Reservation Confirm</title>
</head>
<body class="bg-gray-100">
<div class="flex justify-center w-8/12 mx-auto">
    <div class="bg-white p-8 rounded shadow-md w-full md:w-2/3 lg:w-1/2">
        <h1 class="text-5xl font-bold mb-6">Car brand: {{ $car->brand }} , {{ $car->model }} </h1>
        <div class="flex items-center mb-4">
            <span class="text-gray-600 text-lg">Pickup Date:</span>
            <p class="ml-2 text-gray-800 text-lg">{{ $reservation->pickup_date }}</p>
        </div>
        <div class="flex items-center mb-4">
            <span class="text-gray-600 text-lg">Return Date:</span>
            <p class="ml-2 text-gray-800 text-lg">{{ $reservation->return_date }}</p>
        </div>
        <p class="text-gray-800 text-lg">Total Amount: {{ $amount }}</p>
    </div>
    <div class="flex justify-center w-8/12 mx-auto min-h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full md:w-2/3 lg:w-1/2">
            <form id="payment-form">
                @csrf
                <div id="card-element"></div>
                <div id="card-errors" role="alert"></div>
                <button type="button" id="submit">Pay</button>
                <div id="loading" style="display: none;">Processing payment...</div>
                <div id="success-message" style="display: none;">Payment successful!</div>
            </form>
        </div>
    </div>
</div>
<script>
    var stripe = Stripe("pk_test_51OKxCmJzy3J3PdirVR5wTJEoZDgO5N1ViqHJdvr7orXDFlXz7NDaA3onicDexzKMK5Rp7W1KZ1A2EfKLzUtEwmaV000fBsUdoG");
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    var alertShown = false;
    card.addEventListener('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Update the form submission to use Axios
    $('#submit').on('click', function () {
        var button = document.getElementById('submit');
        var loading = document.getElementById('loading');
        var successMessage = document.getElementById('success-message');

        // Get the CSRF token
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Set up Axios with CSRF token
        axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken;

        // Continue with your existing logic
        stripe.createPaymentMethod({
            type: 'card',
            card: card,
        }).then(function (result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.paymentMethod);
            }
        });
    });

    function stripeTokenHandler(paymentMethod) {
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', paymentMethod.id);
        form.appendChild(hiddenInput);
        // form.submit();

        // Continue with your existing logic
        // ...

        // Submit the form using Axios
        axios.post('/process-payment', {
            payment_method: paymentMethod.id,
            amount: {{ $amount }},
            car: {{ $car->id }},
            reservation: {{ $reservation->id }},
            return_url: encodeURIComponent('https://localhost:3000/payment/success?reservation_id={{ $reservation->id }}&car_id={{ $car->id }}'),
        })
            .then(function (response) {
                // Handle success
                console.log(response.data);
                successMessage.style.display = 'block';

                // Let Laravel handle the redirect
                form.submit();

            })
            .catch(function (error) {
                // Handle error
                console.error(error.response.data);
            });
    }
</script>
</body>
</html>
