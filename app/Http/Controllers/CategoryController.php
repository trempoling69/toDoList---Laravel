<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category as RequestsCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $categories = $user->categories()->get();
        return view('category.all', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsCategory $request)
    {
        $user = Auth::user();
        $user->categories()->create($request->validated());
        return redirect()->route('category.all')->with('success', 'Tâche créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestsCategory $request, string $id)
    {
        // dd($category);
        // dd($request);
        Category::find($id)->update($request->validated());
        return redirect()->route('category.all')->with('success', 'Tâche modifié avec succès');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
