<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;

class CrmController extends Controller
{
    public function index()
    {
        $employees = Employees::count();
        $companies = Companies::count();
        return view('dashboard',compact('employees','companies'));
    }

    public function payment()
    {
        Stripe::setApiKey('sk_test_51NWe4hEX64qUOM5ZGPwvPmDTiYTp5DMV7Xb2DgN6DoGlgeuvrXEGbsXHUSqUfF2FSwd8AbGOgmQ2h3S83Ppr0Y7q00r4lryVgm');

        $charges = Charge::all();

        return view('payment', compact('charges'));
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
