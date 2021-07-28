<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $result = Produk::simplePaginate();

        $data['result'] = $result;
        return view("dashboard.dashboard", $data);
    }

    public function detail($id)
    {
        $result = Produk::find($id);

        $data['result'] = $result;
        return view("dashboard.detail", $data);
    }

    public function beli($id)
    {
        $keranjang = Session::get('keranjang');
        if (empty($keranjang[$id])) $keranjang[$id] = 1;
        else {
            $keranjang[$id]++;
        }
        Session::put('keranjang', $keranjang);
        return redirect('/dashboard')->with('Barang sudah dimasukan kedalam keranjang');
    }

    public function keranjang(Request $request)
    {
        $item = Session::get('keranjang');
        $dataItem = [];
        foreach ($item as $key => $val) {
            $dataItem[] = [
                'id' => $key,
                'produk' => Produk::find($key),
                'jumlah' => $val
            ];
        }
//        dd($dataItem);

        $data['keranjang'] = $dataItem;
        return view('dashboard.keranjang', $data);
    }

    public function hapusKeranjang($id)
    {
        $item = Session::get('keranjang');
        unset($item[$id]);
        Session::put('keranjang', $item);
        return redirect('/keranjang')->with('success', 'Keranjang berhasil dihapus');
    }

    public function checkout() {
        $item = Session::get('keranjang');

        $date = Carbon::now();
        $trx = Transaksi::create([
            'customer_id' => auth()->user()->id,
            'tanggal' => $date,
            'kode_transaksi' => '0',
        ]);

        $kode = str_pad($trx->id, 3, '0', STR_PAD_LEFT);
        $kode = sprintf('INV/%s%s%s%s', $date->format('y'), $date->format('m'), $date->format('d'), $kode);
        $trx->kode_transaksi = $kode;
        $trx->save();

        foreach ($item as $key => $val) {
            TransaksiDetail::create([
                'produk_id' => $key,
                'jumlah' => $val,
                'transaksi_id' => $trx->id,
            ]);
        }

        $data['trx'] = $trx;

        return view('dashboard.transaksi', $data);
    }
}
