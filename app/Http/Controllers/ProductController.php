<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // get all categories with estatus = 1
        $categories = Category::where('estado', 1)->get();
        // get all barcodes
        $barcodes = Barcode::where('estado', 1)->get();

        // precios
        $prices = Price::where('estado', 1)->get();

        return view('products.create', compact('categories', 'barcodes', 'prices'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'codigo' => 'required|unique:products|regex:/^[0-9]+$/|max:20',
            'descripcion' => 'required|unique:products|max:60',
            'category_id' => 'required|exists:categories,id',
            'barcode' => 'required|array|min:1',
            // 'barcode.*' => 'required|exists:barcodes,id',
            'precios' => 'required|array|min:1',
            // 'precios.*' => 'required|exists:prices,id',
            'estado' => 'required',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Producto creado con éxito');
    }
}
