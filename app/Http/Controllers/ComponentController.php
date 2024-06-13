<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Motorcycle;
use App\Models\Payment;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            case 'bikes':
                $bikesData = $this->checkAvailabilityAndTotalRents();
                return view('components.bikes', [
                    'avaibleMotorCycles' => $bikesData['avaibleMotorCycles'],
                    'totalRentedThisMonth' => $bikesData['totalRentedThisMonth'],

                ])->render();
            case 'admin-settings':
                $customers = $this->fetchCustomers();
                return view('components.admin-settings', compact('customers'))->render();

            case 'main':
                return view('components.main')->render();
            default:

                $customerCount = User::where('role', 'customer')->count();
                $totalSales = Payment::sum('payment_amount');
                $rentals = Rental::count();

                return view('components.home', compact('customerCount', 'totalSales', 'rentals'))->render();
        }
    }


    private function checkAvailabilityAndTotalRents()
    {
        $today = Carbon::today();
        $avaibleMotorCycles = Motorcycle::whereDoesntHave('rentals', function ($query) use ($today) {
            $query->where('rental_date', '<=', $today)
                ->where(function ($query) use ($today) {
                    $query->whereNull('return_date')
                        ->orWhere('return_date', '>=', $today);
                });
        })->count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $totalRentedThisMonth = Rental::whereBetween('rental_date', [
            $startOfMonth, $endOfMonth
        ])->sum('rental_value');

        return [
            'avaibleMotorCycles' => $avaibleMotorCycles,
            'totalRentedThisMonth' => $totalRentedThisMonth
        ];
    }

    private function fetchCustomers()
    {
        $customers = User::where('role', 'customer')->get();

        return $customers;
    }

  
}
