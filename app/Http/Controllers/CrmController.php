<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe\Stripe;
use Stripe\Charge;

class CrmController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function payment()
    {
        Stripe::setApiKey('sk_test_51NWe4hEX64qUOM5ZGPwvPmDTiYTp5DMV7Xb2DgN6DoGlgeuvrXEGbsXHUSqUfF2FSwd8AbGOgmQ2h3S83Ppr0Y7q00r4lryVgm');

        $charges = Charge::all(['limit' => 10]); // retrieves the last 10 payments, adjust as needed

        return view('paymnet', compact('charges'));
    }

    public function charge(Request $request)
    {

        $validatedData = $request->validate([
            'amount' => 'required|numeric|min:1',
            'stripeToken' => 'required'
        ]);

        $amountInCents = $validatedData['amount'] * 100;

        Stripe::setApiKey('sk_test_51NWe4hEX64qUOM5ZGPwvPmDTiYTp5DMV7Xb2DgN6DoGlgeuvrXEGbsXHUSqUfF2FSwd8AbGOgmQ2h3S83Ppr0Y7q00r4lryVgm');

        $charge = Charge::create([
            'amount' => $amountInCents,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $request->stripeToken,
        ]);

        return back()->with('success', 'Payment succeeded!');
    }
}
