<?php

namespace App\Http\Controllers\Client;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class PaypalController extends Controller
{
    public function create(Order $order){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $token = $provider->getAccessToken();

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => "USD",
                    "value" => number_format($order->total*0.1, 2, '.', '')
                ]
            ]],
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ]
        ]);

        return redirect(collect($order['links'])->firstWhere('rel', 'approve')['href']);
    }
    public function success(Request $request,Order $order)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $result = $provider->capturePaymentOrder($request->token);

        $order->update(['status'=>'shipped']);

        return redirect('/')->with('success', 'Payment successful');
    }
    public function cancel()
    {
        return redirect('/')->with('error', 'Payment cancelled');
    }
}
