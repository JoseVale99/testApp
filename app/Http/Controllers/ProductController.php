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
        $validatedData = $request->validate([
            'codigo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'estado' => 'required|boolean',
            // 'codigosBarras' => 'required|numeric|max:20',
            // 'codigosBarras.*.estado' => 'nullable|boolean',
            // 'precios.*.precio' => 'required|numeric',
            // 'precios.*.estado' => 'nullable|boolean',
        ]);

        $product = Product::create($validatedData);


        foreach ($request->codigosBarras as $codBarrasData) {
            $codigoBarra = new  Barcode();
            $codigoBarra->codigo = $codBarrasData['codigo'];
            $codigoBarra->estado = isset($codBarrasData['activo']) && $codBarrasData['activo'];
            $product->barcodes()->save($codigoBarra);
        }

        foreach ($request->precios as $precioData) {
            $precio = new  Price();
            $precio->precio = $precioData['precio'];
            $precio->estado = isset($precioData['activo']) && $precioData['activo'];
            $product->prices()->save($precio);
        }

        return redirect()->route('products.index')
            ->with('success', 'Producto creado con éxito');
    }

    public function show(Product $product)
    {
        $categories = Category::where('estado', 1)->get();
        $barcodes = Barcode::all();
        $codes = $product->barcodes()->pluck('codigo')->toArray();
        $prices = Price::all();
        $precios = $product->prices()->pluck('precio')->toArray();
        return view('products.show', compact('product', 'categories', 'barcodes', 'prices', 'codes', 'precios'));
    }

    public function edit(Product $product)
    {
        $categories = Category::where('estado', 1)->get();
        // $barcodes = Barcode::all();
        // $codes = $product->barcodes()->pluck('codigo')->toArray();
        // $prices = Price::all();
        // $precios = $product->prices()->pluck('precio')->toArray();
        return view(
            'products.edit',
            compact('product', 'categories')
        );
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'codigo' => 'required|regex:/^[0-9]+$/|max:20',
            'descripcion' => 'required|max:60',
            'category_id' => 'required|exists:categories,id',
            'estado' => 'required',
        ]);


        // $product->update($request->all());

        // $product->barcodes()->update(['estado' => $request->estado]);
        // dd($request->all());
        foreach ($request->codigos_barras as $codBarrasData) {

            //    update codigos barras with estado = 0
            // dd($codBarrasData['estado']);
            $product->barcodes()->where('codigo', $codBarrasData['codigo'])->update(

                [
                    'estado' => empty($codBarrasData['estado']) ? 0 : 1
                ]
            );
        }

        foreach ($request->precios as $precioData) {

            $product->prices()->where('precio', $precioData['precio'])->update(

                [
                    'estado' => empty($precioData['estado']) ? 0 : 1
                ]
            );
        }

        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado con éxito');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado con éxito');
    }
}
