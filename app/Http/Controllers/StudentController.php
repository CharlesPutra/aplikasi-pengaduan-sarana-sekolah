<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // ambil data berdasarkan user login
        $student = Student::where('user_id', auth()->id())->first();

        return view('Siswa.Student', compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:students',
            'kelas' => 'required',
        ]);

        Student::create([
            'user_id' => auth()->id(), // INI KUNCINYA
            'nis' => $request->nis,
            'kelas' => $request->kelas,
        ]);

        return back()->with('success', 'Data disimpan');
    }

    public function update(Request $request)
    {
        $student = Student::where('user_id', auth()->id())->firstOrFail();

        $student->update([
            'nis' => $request->nis,
            'kelas' => $request->kelas,
        ]);

        return back()->with('success', 'Data diupdate');
    }
}
