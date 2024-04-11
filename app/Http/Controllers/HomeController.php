<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Rent;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productCount = Product::count();
        $customerCount = Customer::count();
        $rentCount = Rent::count();

        $rentsPerMonth = \DB::table('rents')
        ->select(DB::raw('COUNT(*) as total'))
        ->groupBy(DB::raw('YEAR(rental_date), MONTH(rental_date)'))
        ->pluck('total');

        $months = \DB::table('rents')
        ->select(DB::raw('CONCAT(YEAR(rental_date), "-", MONTH(rental_date)) AS month'))
        ->groupBy(DB::raw('YEAR(rental_date), MONTH(rental_date)'))
        ->pluck('month')
        ->map(function ($month) {
            return \Carbon\Carbon::parse($month)->format('F');
        });

        return view('home', [
            'productCount' => $productCount,
            'customerCount' => $customerCount,
            'rentCount' => $rentCount,
            'rentsPerMonth' => $rentsPerMonth,
            'months' => $months,
        ]);

    }
}
