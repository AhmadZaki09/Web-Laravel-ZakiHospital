<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class Hospital extends Controller
{
    function navbar()
    {
        return view('include.navbar');
    }

    function index()
    {
        return view('index');
    }

    function daftar()
    {
        if (!session('berhasilLogin')) {
            Session::flash('message', 'Login Terlebih dahulu!');
            return redirect()->route('login');
        }

        $dokters = Dokter::all();
        return view('daftar-pasien', compact('dokters'));
    }

    function login()
    {
        if (session('berhasilLogin')) {
            Session::flash('message', 'Logout Terlebih dahulu!');
            return redirect()->route('index');
        }
        return view('login');
    }

    function loginvalid(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'password' => 'required',
        ]);

        $name = $request->name;
        $password = $request->password;
        $kode = $request->admin;

        $user = User::where('name', $name)->first();

        if ($user && Hash::check($password, $user->password)) {

            if ($user->admin === 'yes') {
                session(['adminlogin' => true]);
                Session::flash('message2', 'Selamat datang admin :) ');
            }

            session(['berhasilLogin' => true]);
            session(['user_id' => $user->id]);
            session(['user_name' => $user->name]);

            return redirect()->route('index');
        } else {
            return back()->with(Session::flash('message', 'Login tidak berhasil!! Pastikan akun anda benar.'));
        }
    }

    function register()
    {
        return view('register');
    }

    function registervalid(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'password' => 'required',
        ]);

        User::create($request->all());

        Session::flash('message2', 'Akun anda berhasil dibuat!');

        return redirect()->route('login');
    }

    function pasienvalid(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
            'penyakit' => 'required',
            'dokter_id' => 'required',
            'nomor' => 'max:13'
        ]);

        Pasien::create($request->all());


        Session::flash('message2', 'Pasien berhasil didaftarkan!');

        return redirect()->route('daftar');
    }

    function logout()
    {
        if (!session('berhasilLogin')) {
            Session::flash('message', 'Anda belum login!');
            return redirect()->route('login');
        }
        session()->flush(); // hapus semua data session
        Session::flash('message2', 'Anda berhasil logout!');
        return redirect()->route('login');
    }

    function datapasien(Request $request)
    {

        $name = $request->name;
        $penyakit = $request->penyakit;

        $pasiens = pasien::with('nik')->where('name', 'LIKE', '%' . $name . '%')->where('penyakit', 'LIKE', '%' . $penyakit . '%')->orderBy('id', 'desc')->Paginate(10);
        return view('data-pasien', ['pasiens' => $pasiens, 'name' => $name, 'penyakit' => $penyakit]);
    }

    function deletepasien($id)
    {
        if (!session('adminlogin')) {
            Session::flash('message', 'Hanya admin yg bisa menghapus data!');
            return redirect()->route('data');
        }
        $pasien = Pasien::where('id', $id)->delete();

        Session::flash('message2', 'Pasien sudah dihapus');
        return redirect()->route('data');
    }

    function editpasien($id)
    {
        if (!session('adminlogin')) {
            Session::flash('message', 'Hanya admin yg bisa mengubah data!');
            return redirect()->route('data');
        }
        $pasien = Pasien::where('id', $id)->first();
        if (!$pasien) {
            abort(404);
        }
        $dokters = Dokter::all();
        return view('data-pasien-edit',  compact('dokters'), ['pasien' => $pasien]);
    }

    function updatepasien(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required',
            'penyakit' => 'required',
            'dokter_id' => 'required',
            'nomor' => 'max:13',
        ]);

        Pasien::where('id', $id)->update($request->only(['name', 'gender', 'penyakit', 'dokter_id', 'nomor', 'alamat', 'note']));

        Session::flash('message2', 'Pasien sudah diedit!');

        return redirect()->route('data');
    }
}
