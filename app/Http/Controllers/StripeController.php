<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function session()
    {

        Stripe::setApiKey('sk_test_51NUtYgLVvAZLhnohi77fT2TWkccSxGlxLlzRzMxwAdztgzzBtcuswYlUqrIN4Q5KZdXVDyoD88Pzi11Je0nHk9Nj00tFK7XILy');

        $productItems = [];

        foreach(session('cart') as $id => $details)
        {
            $product_name= $details['product_name'];
            $total= $details['price'];
            $quantity= $details['quantity'];

            $two0= "00";
            $unit_amount= "$total$two0";

            $productItems[] = [
                'price_data' => [
                    'product_data' => [
                        'name' => $product_name,
                    ],
                    'currency' => 'USD',
                    'unit_amount' => $unit_amount,
                ],
                'quantity' => $quantity,
            ];
            // echo $product_name;
        }

        $checkoutSession= \Stripe\Checkout\Session::create([
            'line_items' => [$productItems],
            'mode' => 'payment',
            'allow_promotion_codes' => true,
            'metadata' => [
                'user_id' => '001'
            ],
            'customer_email' => "kyaunglanhtan98@gmail.com",
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);

        // return 'success';

        return redirect()->away($checkoutSession->url);
    }

    public function success()
    {
        return "Thank you for shopping with us";
    }

    public function cancel()
    {
        return "cancel";
    }
}
