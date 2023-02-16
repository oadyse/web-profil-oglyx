<?php

namespace App\Http\Controllers;

use App\Models\M_detailPemesanan;
use App\Models\M_detailTotalPemesanan;
use App\Models\M_pemesanan;
use App\Models\M_produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'orders' => M_pemesanan::all(),
        ];
        return view('dashboard.menu-pesanan', $data);
    }

    public function produk()
    {
        $data = [
            'product' => M_produk::all(),
        ];
        return view('dashboard.menu-produk', $data);
    }

    public function addNew(Request $request)
    {
        if (!empty($request->file('gambar'))) {
            $file = $request->file('gambar');
            //mengambil nama file
            $nama_file = $file->getClientOriginalName();
            $file->move('dokumen/produk/', $nama_file);
        } else {
            $nama_file = null;
        }
        $add = M_produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_file,
        ]);
        $add->save();

        if ($add) {
            return redirect('/admin/daftar_produk')->with("successAdd", "Data added successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function processUpdate(Request $request, $id)
    {
        if (!empty($request->file('gambar'))) {
            $file = $request->file('gambar');
            //mengambil nama file
            $nama_file = $file->getClientOriginalName();
            $file->move('dokumen/produk/', $nama_file);
        } else {
            $nama_file = null;
        }
        $process = M_produk::findOrFail($id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'gambar' => $nama_file,
        ]);
        if ($process) {
            return redirect('/admin/daftar_produk')->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }

    public function delete($id)
    {
        try {
            $process = M_produk::findOrFail($id)->delete();
            if ($process) {
                return redirect()->back()->with("delete", "Poof! Your data has been deleted!");
            } else {
                return redirect()->back()->withErrors("Terjadi kesalahan saat menghapus data");
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }

    public function detail($id)
    {
        $data = [
            'details' => M_detailPemesanan::getDetail($id),
            'totals' => M_detailTotalPemesanan::getTotal($id),
            'pesanan' => M_pemesanan::where('id', $id)->first()
        ];
        // dd($data['totals']);
        return view('detail', $data);
    }

    public function changeStatus(Request $request, $id)
    {
        $process = M_pemesanan::findOrFail($id)->update([
            'status' => $request->status,
        ]);
        if ($process) {
            return redirect()->back()->with("successUpdate", "Data updated successfully");
        } else {
            return redirect()->back()->withInput()->withErrors("Terjadi kesalahan");
        }
    }
}
