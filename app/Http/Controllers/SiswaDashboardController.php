<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $student = auth()->user()->student;

        if (!$student) {
            return back()->with('error', 'Data student tidak ditemukan');
        }

        $total = Aspiration::where('student_id', $student->id)->count();
        $pending = Aspiration::where('student_id', $student->id)
            ->where('status', 'pending')->count();
        $proses = Aspiration::where('student_id', $student->id)
            ->where('status', 'diproses')->count();
        $selesai = Aspiration::where('student_id', $student->id)
            ->where('status', 'selesai')->count();

        return view('Siswa.Dashboard', compact(
            'total',
            'pending',
            'proses',
            'selesai'
        ));
    }
}
