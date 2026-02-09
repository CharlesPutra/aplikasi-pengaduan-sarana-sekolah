<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Category;
use Illuminate\Http\Request;

class AspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data aspiration sesuai dengan auth login siswa contoh charles data aspiration yang muncul punya charles
        $student = auth()->user()->student;
        //filtering data
        $aspirations = Aspiration::with('category')->where('student_id',$student->id)->latest()->get();
        return view('Siswa.Aspiration.index',compact('aspirations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //memasukan data category ke aspiration create
        $category = Category::all();
        return view('Siswa.Aspiration.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:categories,id',
            'lokasi' => 'required',
            'ket' => 'required'
        ]);

        //buat variabel untuk ambil akun siswa dengan user id yang sama contoh charles mau nambah data sarana tapi user id atau student id sama baru bisa nambah data sarana
        $student = auth()->user()->student;
        //tambah data
        Aspiration::create([
            'student_id' => $student->id,
            'id_kategori' => $request->id_kategori,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket,
            'status' => 'pending'
        ]);
        return redirect()->route('siswa.aspiration.index')->with('success','data berhasil di tambahkan');
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
        $student = auth()->user()->student;
        $aspiration = Aspiration::where('id',$id)->where('student_id',$student->id)->where('status','pending')->firstOrFail();
        $categories = Category::all();
        return view('Siswa.Aspiration.edit',compact('aspiration','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $student = auth()->user()->student;
        $aspiration = Aspiration::where('id',$id)->where('student_id',$student->id)->where('status','pending')->firstOrFail();
        //update data dari sarana di atas
        $aspiration->update([
            'id_kategori' => $request->id_kategori,
            'lokasi' => $request->lokasi,
            'ket' => $request->ket
        ]);
        return redirect()->route('siswa.aspiration.index')->with('success','data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = auth()->user()->student;
        $aspiration = Aspiration::where('id',$id)->where('student_id',$student->id)->where('status','pending')->firstOrFail();
        $aspiration->delete();
        return redirect()->route('siswa.aspiration.index')->with('success','data berhasil di hapus');
    }
}
