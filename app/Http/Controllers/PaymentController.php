<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $stripeSecretKey = "sk_test_51OKxCmJzy3J3PdirHqemG3Gw0i6bM6jNlrhOlmeDOR5CKqxCCQ7GSBXiUtvJqq65oCZXSIqOAYVHjiePG2vJj0ML00w0LzZMXf";

        try {
            Stripe::setApiKey($stripeSecretKey);

            // Access payment method, amount, and description from $request
            $paymentMethod = $request->input('payment_method');
            $amount = $request->amount;
            $reservationId = $request->reservation_id;
            $carId = $request->car_id;
            $description = $request->input('description');

            // Use Stripe API to complete the payment
            $paymentIntent = PaymentIntent::create([
                'payment_method' => $paymentMethod,
                'amount' => $amount,
                'currency' => 'USD',
                'confirm' => true,
                'automatic_payment_methods[enabled]' => true,
                "automatic_payment_methods[allow_redirects]" => "never",
            ]);

            // Handle successful payment
            Session::flash('success', 'Payment processed successfully');
            self::handlePaymentSuccess($request, $reservationId, $carId);

            return redirect()->route('dashboard')->with('success', 'Reservation approved successfully.');
        } catch (\Exception $e) {
            // Handle payment failure
            return response()->json(['error' => 'Payment failed. ' . $e->getMessage()], 500);
        }
    }

    function handlePaymentSuccess(Request $request, mixed $reservationId, mixed $carId)
    {
        // Get the parameters from the redirect URL

        $paymentStatus = "";
        $car = Car::where('id', '=', $carId)->first();

        // Update the reservation status and save payment information
        $reservation = Reservation::where('id', '=', $reservationId)->first();

        if ($reservation) {
            $reservation->update(['status' => "Approved"]);
            Session::flash('success', 'Payment processed successfully');

            // Redirect or display a success message
            return redirect('/dashboard')->with('success', 'Reservation approved successfully with a successfull payment.');
        } else {
            // Handle the case where the reservation is not found
            Session::flash('error', 'Payment failed.');

            return view('dashboard');
        }
    }


}
