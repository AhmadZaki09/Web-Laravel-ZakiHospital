<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class dokterController extends Controller
{
    function show()
    {
        $dokter = Dokter::with('days')->get();
        return view('dokter', ['dokters' => $dokter]);
        
    }

    function tambah()
    {
        if (!session('adminlogin')) {
            Session::flash('message', 'Hanya admin yg bisa menambah dokter!');
            return redirect()->route('dokter');
        }
        return view('tambah-dokter');
    }

    function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'specialis' => 'required',
        ]);

        $fileName = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('gambar'), $fileName);
        }

        Dokter::create([
            'nama' => $request->nama,
            'specialis' => $request->specialis,
            'gambar' => $fileName,
        ]);


        Session::flash('message2', 'Dokter berhasil didaftarkan!');

        return redirect()->route('dokter');
    }

    function delete($id)
    {
        if (!session('adminlogin')) {
            Session::flash('message', 'Hanya admin yg bisa menghapus dokter!');
            return redirect()->route('dokter');
        }

        Dokter::where('id', $id)->delete();

        Session::flash('message2', 'Dokter sudah dihapus');
        return redirect()->route('dokter');
    }

    function komentar(Request $request, $dokter_id)
    {
        $request->validate([
            'komentar' => 'required|max:255',
        ]);

        Komentar::create([
            'komentar' => $request->komentar,
            'dokter_id' => $dokter_id,
        ]);

        return redirect()->route('dokter');
    }
}
