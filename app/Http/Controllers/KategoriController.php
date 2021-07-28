<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $result = Kategori::query();
        $search = @$request->get('search');

        if (!empty($search)) {
            $result->where('nama_kategori', 'like', '%' . $search . '%');
        }

        $data['data'] = $result->simplePaginate();
        $data['search'] = $search;
        return view('kategori.list', $data);
    }

    public function form($id = null)
    {
        $data = [];

        if (!empty($id)) {
            $data['result'] = Kategori::find($id);
        }

        return view('kategori.form', $data);
    }

    public function store(Request $request, $id = null) {
        $input = $request->all();
        if (empty($id)) {
            Kategori::create($input);
        } else {
            Kategori::find($id)->update($input);
        }

        return redirect('/kategori')->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        if (!empty($kategori)) $kategori->delete();
        return redirect('/kategori')->with('success', 'Data berhasil dihapus.');;
    }
}
