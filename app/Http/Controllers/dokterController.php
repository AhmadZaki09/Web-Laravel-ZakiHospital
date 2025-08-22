<?php

namespace App\Http\Controllers;

use App\Models\Day;
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

        $days = Day::all();
        return view('tambah-dokter', ['days' => $days]);
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

        $dokter = Dokter::create([
            'nama' => $request->nama,
            'specialis' => $request->specialis,
            'gambar' => $fileName,
        ]);

        $dokter->days()->attach($request->hari);

        Session::flash('message2', 'Dokter berhasil didaftarkan!');

        return redirect()->route('dokter');
    }

    function delete(Request $request, $id)
    {
        if (!session('adminlogin')) {
            Session::flash('message', 'Hanya admin yg bisa menghapus dokter!');
            return redirect()->route('dokter');
        }

        $dokter = Dokter::findOrFail($id);

        $dokter->days()->detach($request->hari);

        $dokter->komentars()->delete();

        $dokter->delete();

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

    function edit($id)
    {
        if (!session('adminlogin')) {
            Session::flash('message', 'Hanya admin yg bisa menambah dokter!');
            return redirect()->route('dokter');
        }

        $dokter = Dokter::with('days')->findOrFail($id);

        if (!$dokter) {
            abort(404);
        }

        $days = Day::all();

        return view('edit-dokter', ['days' => $days, 'dokter' => $dokter]);
    }

    function update(Request $request, $id)
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
        } else {
            $fileName = $request->gambar_lama; // pakai gambar lama
        }

        $dokter = Dokter::findOrFail($id);

        $dokter->update([
            'nama' => $request->nama,
            'specialis' => $request->specialis,
            'gambar' => $fileName,
        ]);

        $dokter->days()->sync($request->hari);

        Session::flash('message2', 'Dokter sudah diedit!');

        return redirect()->route('dokter');
    }
}
