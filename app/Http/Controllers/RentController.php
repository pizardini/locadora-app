<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;
use App\Models\Customer;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $rents = Rent::latest()->paginate(5);

        return view('rents.index', compact('rents'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $products = Product::all();
    //     $customers = Customer::all();

    //     return view('rents.create', compact('products', 'customers'));
    // }

    public function create($customerId = null)
    {
        $products = Product::all();
        $customers = null;
        $selectedCustomer = null;
    
        if ($customerId) {
            $selectedCustomer = Customer::findOrFail($customerId);
            $customers = collect([$selectedCustomer]);
        } else {
            $customers = Customer::all();
        }
    
        return view('rents.create', compact('products', 'customers','selectedCustomer'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date',
            'returned_at' => 'nullable|date',
            'active' => 'boolean',
            'total_amount' => 'nullable|numeric',
            'late_fee' => 'nullable|numeric',
        ]);

        Rent::create($request->all());

        return redirect()->route('rents.index')->with('success', 'Locação cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent): View
    {
        return view('rents.show', compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rent $rent): View
    {
        return view('rents.edit', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent): RedirectResponse
    {
        $request->validate([
            'product_id' => 'required',
            'customer_id' => 'required',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date',
            'returned_at' => 'nullable|date',
            'active' => 'required|boolean',
            'total_amount' => 'nullable|numeric',
            'late_fee' => 'nullable|numeric',
        ]);

        $rent->update($request->all());

        return redirect()->route('rents.index')->with('success', 'Locação atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent): RedirectResponse
    {
        $rent->delete();

        return redirect()->route('rents.index')->with('success', 'Locação removida com sucesso.');
    }
}