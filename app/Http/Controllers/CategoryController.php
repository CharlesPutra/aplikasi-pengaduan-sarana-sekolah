<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Category::latest()->get();
        return view('Admin.Category.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['ket_kategori' => 'required']);
        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('succsess', 'data berhasil di tambhakan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Category::findOrFail($id);
        return view('Admin.Category.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Category::findOrFail($id);
        $request->validate(['ket_kategori' => 'required']);
        $update->update($request->all());
        return redirect()->route('admin.category.index')->with('succsess', 'data berhasil di tambhakan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Category::findOrFail($id);
        $delete->delete();
        return redirect()->route('admin.category.index')->with('succsess', 'data berhasil di tambhakan');
    }
}
