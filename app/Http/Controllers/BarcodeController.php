<?php

namespace App\Http\Controllers;

use App\Models\Barcode;
use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        $barcodes = Barcode::paginate(5);
        return view('barcodes.index', compact('barcodes'));
    }

    public function create()
    {

        return view('barcodes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:barcodes|max:20|regex:/^[0-9]+$/',
            'estado' => 'required'
        ]);

        Barcode::create($request->all());
        return redirect()->route('barcodes.index');
    }

    public function show(Barcode $barcode)
    {
        return view('barcodes.show', compact('barcode'));
    }

    public function edit(Barcode $barcode)
    {
        return view('barcodes.edit', compact('barcode'));
    }

    public function update(Request $request, Barcode $barcode)
    {
        $request->validate([
            'codigo' => 'required|max:20|regex:/^[0-9]+$/',
            'estado' => 'required'
        ]);

        $barcode->update($request->all());
        return redirect()->route('barcodes.index')->with('success', 'actualizado correctamente');
    }

    public function destroy(Barcode $barcode)
    {
        $barcode->delete();
        return redirect()->route('barcodes.index')->with('success', 'eliminado correctamente');
    }
}
