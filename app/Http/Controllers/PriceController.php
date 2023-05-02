<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{

    public function index()
    {
        $prices = Price::paginate(5);
        return view('prices.index', compact('prices'));
    }

    public function create()
    {
        return view('prices.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'precio' => 'required|numeric',
            'estado' => 'required',
        ]);
        Price::create($request->all());

        return redirect()->route('prices.index')->with('success', 'Precio creado correctamente');
    }

    public function show(Price $price)
    {
        return view('prices.show', compact('price'));
    }

    public function edit(Price $price)
    {
        return view('prices.edit', compact('price'));
    }

    public function update(Request $request, Price $price)
    {
        $request->validate([
            'precio' => 'required|numeric',
            'estado' => 'required',
        ]);
        $price->update($request->all());

        return redirect()->route('prices.index')->with('success', 'Precio actualizado correctamente');
    }

    public function destroy(Price $price)
    {
        $price->delete();

        return redirect()->route('prices.index')->with('success', 'Precio eliminado correctamente');
    }
}
