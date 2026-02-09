<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Category;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminAspirationController extends Controller
{
public function index(Request $request)
{
    $query = Aspiration::with(['student.user', 'category']);

    // Filter range tanggal
    if ($request->filled('start_date') && $request->filled('end_date')) {
        $query->whereBetween('created_at', [
            $request->start_date . ' 00:00:00',
            $request->end_date . ' 23:59:59'
        ]);
    }

    // Filter bulan
    if ($request->filled('month')) {
        $query->whereMonth('created_at', $request->month);
    }

    // Filter siswa
    if ($request->filled('student_id')) {
        $query->where('student_id', $request->student_id);
    }

    // Filter kategori
    if ($request->filled('id_kategori')) {
        $query->where('id_kategori', $request->id_kategori);
    }

    // Filter status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    $aspirations = $query->latest()
        ->paginate(10)
        ->withQueryString();

    $students = Student::with('user')->get();
    $categories = Category::all();

    return view('Admin.Aspiration.index', compact(
        'aspirations',
        'students',
        'categories'
    ));
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
