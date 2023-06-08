<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://pay.google.com/gp/p/js/pay.js"></script>
</head>
<body>
    <!-- Your checkout form and other elements -->
    
    <script>
        var stripe = Stripe("{{ config('services.stripe.api_key') }}");
        var elements = stripe.elements();
        var prButton = elements.create('paymentRequestButton', {
            paymentRequest: createPaymentRequest(),
        });

        // Check if the browser supports the Payment Request API
        if (prButton.mount) {
            prButton.mount('#payment-request-button');
        } else {
            document.getElementById('payment-request-button').style.display = 'none';
        }

        function createPaymentRequest() {
            var paymentRequest = stripe.paymentRequest({
                country: 'IN',
                currency: 'inr',
                total: {
                    label: 'Total',
                    amount: {{ $amount * 100 }}, // Amount in cents
                },
                requestPayerName: true,
                requestPayerEmail: true,
                requestShipping: false,
                googlePay: true,
            });

            var elements = stripe.elements();
            var prButton = elements.create('paymentRequestButton', {
                paymentRequest: paymentRequest,
            });

            paymentRequest.on('paymentmethod', function(ev) {
                // Process the payment method returned by the Payment Request API
                stripe.confirmCardPayment("{{ config('services.stripe.secret') }}", {
                    payment_method: ev.paymentMethod.id,
                }).then(function(result) {
                    if (result.error) {
                        // Handle errors
                    } else {
                        // Handle successful payment
                    }
                });
            });

            return paymentRequest;
        }
    </script>
</body>
</html>
