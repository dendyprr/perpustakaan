<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Buku::where('isbn', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Buku::paginate(5);
        }

        return view('databuku', compact('data'));
    }

    public function tambahbuku()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        Buku::create($request->all());
        return redirect()->route('perpustakaan')->with('success', 'Data Berhasil Di tambahkan');
    }

    public function tampildata($id)
    {
        $data = Buku::find($id);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Buku::find($id);
        $data->update($request->all());
        return redirect()->route('perpustakaan')->with('success', 'Data Berhasil Di edit');
    }

    public function delete($id)
    {
        $data = Buku::find($id);
        $data->delete();
        return redirect()->route('perpustakaan')->with('success', 'Data Berhasil Di Hapus');
    }
}