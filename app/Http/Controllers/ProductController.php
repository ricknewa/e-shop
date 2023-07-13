<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use PHPUnit\Framework\Attributes\Ticket;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with('products', $products);

    }
    public function dashboard()
    {
        $products = Product::latest()->filter(request(['search']))->paginate(6);
        return view('dashboard')->with('products', $products);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {

        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id(),
            'price' => $request->price,
        ]);
        if ($request->file('image')) {
            $this->storeimage($request, $product);
        }
        else{
            
        }
        return redirect(route('product.index'))->with('message', 'Avatar is updated');
    }

    public function show(product $product)
    {
        // dd($product);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateproductRequest $request, product $product)
    {
        $product->update(['title' => $request->title, 'description' => $request->description,'price'=>$request->price]);

        if ($request->file('image')) {
            if($product->image != null)
            Storage::disk('public')->delete($product->image);
            $this->storeimage($request, $product);
        }

        return redirect(route('product.show', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }
    protected function storeimage($request, $product)
    {
        $ext = $request->file('image')->extension();
        $contents = file_get_contents($request->file('image'));
        $filename = Str::random(25);
        $path = "image/$filename.$ext";
        Storage::disk('public')->put($path, $contents);
        $product->update(['image' => $path]);
    }
}
