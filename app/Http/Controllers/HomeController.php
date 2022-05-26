<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,mst_karyawan,mst_lokasi, absensi};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $lokasi = mst_lokasi::count();
        $absensi = absensi::count();
        $karyawan = mst_karyawan::count();
        $widget = [
            'users' => $users,
            'lokasi' => $lokasi,
            'absensi' => $absensi,
            'karyawan' => $karyawan
        ];
        return view('home', compact('widget'));
    }

    public function adminHome()
    {
        return view('adminHome');
    }
}
