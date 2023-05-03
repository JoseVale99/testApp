<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('can:categories.index');
        $this->middleware('can:categories.create')->only(['create', 'store']);
        $this->middleware('can:categories.edit')->only(['edit', 'update']);
    }

    public function index(Request $request)
    {

        //    Paginate Categories
        $buscar = $request->search;
        $categories = Category::where('codigo', 'like', '%' . $buscar . '%')
            ->orWhere('descripcion', 'like', '%' . $buscar . '%')
            ->orWhere('estado', 'like', '%' . $buscar . '%')
            ->paginate(10);

        return view('categories.index', compact("categories"));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:categories|max:10|regex:/^[0-9]+$/',
            'descripcion' => 'required|max:60|regex:/^[a-zA-Z0-9 ]+$/',
            'estado' => 'required',
        ]);

        $category = Category::create([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría Creada exitosamente');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact("category"));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact("category"));
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
            'codigo' => 'required|max:10|regex:/^[0-9]+$/',
            'descripcion' => 'required|max:60|regex:/^[a-zA-Z0-9]+$/',
            'estado' => 'required',
        ]);

        $category->update([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
        ]);

        return redirect()->route('categories.index')->with('success', 'Categoría Actualizada exitosamente');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoría Eliminada exitosamente');
    }
}
