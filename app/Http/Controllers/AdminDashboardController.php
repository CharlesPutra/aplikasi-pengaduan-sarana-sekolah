<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $total   = Aspiration::count();
        $pending = Aspiration::where('status', 'pending')->count();
        $proses  = Aspiration::where('status', 'diproses')->count();
        $selesai = Aspiration::where('status', 'selesai')->count();

        // Data Chart Kategori
        $categories = Category::withCount('aspirations')->get();

        $categoryLabels = $categories->pluck('ket_kategori');
        $categoryData   = $categories->pluck('aspirations_count');

        return view('Admin.dashboard', compact(
            'total',
            'pending',
            'proses',
            'selesai',
            'categoryLabels',
            'categoryData'
        ));
    }
}
