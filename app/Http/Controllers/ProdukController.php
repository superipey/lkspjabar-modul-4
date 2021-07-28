<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $result = Produk::query();
        $search = @$request->get('search');

        if (!empty($search)) {
            $result->where('nama_produk', 'like', '%' . $search . '%');
        }

        $data['data'] = $result->simplePaginate();
        $data['search'] = $search;
        return view('produk.list', $data);
    }

    public function form($id = null)
    {
        $data = [];

        if (!empty($id)) {
            $data['result'] = Produk::find($id);
        }

        return view('produk.form', $data);
    }

    public function store(Request $request, $id = null)
    {
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $request->file('gambar')->storeAs('public', $file->getClientOriginalName());
            $input['gambar'] = $file->getClientOriginalName();
        }

        if (empty($id)) {
            Produk::create($input);
        } else {
            Produk::find($id)->update($input);
        }

        return redirect('/produk')->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!empty($produk)) $produk->delete();
        return redirect('/produk')->with('success', 'Data berhasil dihapus.');;
    }
}
