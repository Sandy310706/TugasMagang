<?php

namespace App\Http\Controllers;

use Error;
use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class KelolaMakananController extends Controller
{
    public function index()
    {
        $data = Makanan::all();
        return view('admin.menuMakanan', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'max:30'],
            'harga' => ['required', 'numeric'],
            'foto' => [ 'mimes:png,jpg,jpeg']
        ]);
        date_default_timezone_set('Asia/Jakarta');
        $data = Makanan::create($request->all());
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $newName = uniqid() . '-' . $foto->getClientOriginalName();
            Storage::disk('local')->put( $newName, file_get_contents($foto));
            $data->foto = $newName;
            $data->save();
        }
        return redirect()->back()->with('berhasil', 'Menu berhasil di tambahkan');
    }
    public function delete($id)
    {
        $data = Makanan::find($id);

        if (!$data) {
            return redirect()->back()->with('gagalHapus', 'Data tidak ditemukan');
        }

        $namaFoto = $data->foto;
        $filePath = public_path('storage/img/' . $namaFoto);

        try {
            if (File::exists($filePath)) {
                File::delete($filePath);
            } else {
                return redirect()->back()->with('gagalHapus', 'File tidak ditemukan');
            }
            $data->delete();
            return redirect()->back()->with('hapusBerhasil', 'Menu berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('gagalHapus', 'Gagal menghapus: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // Temukan data makanan yang akan diupdate
        $data = Makanan::find($id);

        // Jika data tidak ditemukan, kembalikan dengan pesan kesalahan
        if (!$data) {
            return redirect()->back()->with('gagalEdit', 'Data tidak ditemukan');
        }

        // Validasi input dari form
        $request->validate([
            'nama' => 'max:30',
            'harga' => 'numeric',
            'foto' => 'mimes:png,jpg,jpeg'
        ]);

        // Update data makanan dengan input yang valid
        $data->nama = $request->nama;
        $data->harga = $request->harga;

        // Jika ada file foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus file foto lama jika ada
            if (Storage::disk('public')->exists('public/storage/img/' . $data->foto)) {
                Storage::disk('public')->delete('public/strorage/img/' . $data->foto);
            }

            // Simpan file foto baru dengan nama unik
            $foto = $request->file('foto');
            $newName = uniqid() . '.' . $foto->getClientOriginalExtension();
            Storage::disk('public')->put('public/storage/img/' . $newName, file_get_contents($foto));
            $data->foto = $newName;
        }

        // Simpan perubahan pada data makanan
        $data->save();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('editBerhasil', 'Menu berhasil di edit');
    }
}
