<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    public function loadComponent(Request $request)
    {
        $component = $request->input('component');
    switch ($component) {
        case 'clients':
            $customers = User::where('role', 'customer')->get();
            return view('components.clients', compact('customers'))->render();
        case 'settings':
            return view('components.settings')->render();
        default:
        $customerCount=User::where('role','customer')->count();
        $totalSales=Payment::sum('payment_amount');
        $rentals=Rental::count();

            return view('components.home', compact('customerCount', 'totalSales', 'rentals'))->render();
    }
    }
}
