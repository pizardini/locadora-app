<?php
  
namespace App\Http\Controllers;
  
use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
  
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $customers = Customer::latest()->paginate(10);
        
        return view('customers.index',compact('customers'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customers.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'email' => 'required',
            'born_date' => 'required',
            'telefone' => 'required',
            'endereco' => 'required',
        ]);
		
       
		Customer::create($request->all());
         
        return redirect()->route('customers.index')->with('success','Cliente cadastrado com sucesso.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): View{
        
        $rents = $customer->rents;
        return view('customers.show',compact('customer', 'rents'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
        return view('customers.edit',compact('customer'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/',
            'telefone' => 'required',
            'endereco' => 'required',
        ]);
        
        $customer->update($request->all());
        
        return redirect()->route('customers.index')->with('success','Cliente atualizado com sucesso.');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer): RedirectResponse
    {    
        try {
            if ($customer->rents()->exists()) {
                throw new \Exception("Este cliente possui locações associadas. Por favor, exclua todas as locações antes de remover o cliente.");
            }
    
            $customer->delete();
    
            return redirect()->route('customers.index')->with('success', 'Cliente removido com sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}