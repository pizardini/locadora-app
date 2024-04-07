<?php
  
namespace App\Http\Controllers;
  
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;
  
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::latest()->paginate(5);
        
        return view('products.index',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $apiKey = config('services.tmdb.api');
        $tmdbEndpoint = config('services.tmdb.endpoint');
        
        return view('products.create', compact('apiKey', 'tmdbEndpoint'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'cover' => 'nullable',
        ]);
		
       
		Product::create($request->all());
         
        return redirect()->route('products.index')->with('success','Filme criado com sucesso.');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(Product $product): View{
        return view('products.show',compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $apiKey = config('services.tmdb.api');
        $tmdbEndpoint = config('services.tmdb.endpoint');

        return view('products.edit',compact('product', 'apiKey','tmdbEndpoint'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        
        $product->update($request->all());
        
        return redirect()->route('products.index')->with('success','Filme atualizado com sucesso.');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
         
        return redirect()->route('products.index')->with('success','Filme removido com sucesso.');
    }
}