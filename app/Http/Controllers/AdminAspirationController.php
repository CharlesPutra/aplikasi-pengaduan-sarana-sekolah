<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;

class AdminAspirationController extends Controller
{
    public function index() {
        $aspirations = Aspiration::with(['student.user','category'])->latest()->get();
        return view('Admin.Aspiration.index',compact('aspirations'));
    }

    public function show($id) {
        $aspiration = Aspiration::with(['student.user','category'])->findOrFail($id);
        return view('Admin.Aspiration.show',compact('aspiration'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'status' => 'required|in:pending,diproses,selesai',
            'feedback' => 'nullable|string'
        ]);
        $update = Aspiration::findOrFail($id);
        $update->update([
            'status' => $request->status,
            'feedback' => $request->feedback
        ]);
        return redirect()->route('admin.aspirations.index')->with('success','data berhasil di perbarui');
    }
}
