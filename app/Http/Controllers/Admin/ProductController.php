<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $product;
    protected $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product= $product;
        $this->category= $category;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->latest('id')->paginate(5);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->category->get(['id', 'name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataCreate = $request->all();

        $product = $this->product->create($dataCreate);

        return redirect()->route('products.index')->with(['message' => 'create new category: '. $product->name." success"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = $this->product->findOrFail($id)->load(['details', 'categories']);
        return view('admin.products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $products = $this->product->findOrFail($id)->load(['details', 'categories']);

        $categories = $this->category->get(['id', 'name']);

        return view('admin.products.edit', compact('categories', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataUpdate = $request->all();

        $products = $this->product->findOrFail($id);

        $products->update($dataUpdate);

        return redirect()->route('products.index')->with(['message' => 'Update  produ$products: '. $products->name." success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = $this->product->findOrFail($id);

        $products->delete();

        return redirect()->route('prodcuts.index')->with(['message' => 'Delete  products: '. $products->name." success"]);
    }
}
