<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\User;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $misi = DB::table('misi')->get();
        $visi = DB::table('visi')->get();
        $total_pemasukan = Pemasukan::sum('jumlah_pemasukan');
        $total_pemasukan = "Rp" . number_format($total_pemasukan, 0, ',', '.');
        $total_pengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
        $total_pengeluaran = "Rp" . number_format($total_pengeluaran, 0, ',', '.');
        $saldo = DB::table('pemasukan')->sum('jumlah_pemasukan') - DB::table('pengeluaran')->sum('jumlah_pengeluaran');
        $saldo = "Rp" . number_format($saldo, 0, ',', '.');
        $kegiatan = Kegiatan::count();
        $zakat = Zakat::count();
        $user = User::count();
        $pengeluaran = Pengeluaran::all();

        return view('admin.dashboard', compact('total_pemasukan', 'total_pengeluaran', 'kegiatan', 'zakat', 'user', 'saldo', 'visi', 'misi'));
    }

    public function getChart()
    {
        $dana = DB::select("SELECT DATE_FORMAT(tgl_pemasukan, '%M') AS `bulan`, SUM(`jumlah_pemasukan`) AS `total` FROM `pemasukan` GROUP BY `bulan` ORDER BY `id` ASC", []);

        $result = DB::select("SELECT DATE_FORMAT(tgl_pengeluaran, '%M') AS `bulan`, SUM(`jumlah_pengeluaran`) AS `total` FROM `pengeluaran` GROUP BY `bulan` ORDER BY `id` ASC", []);

        return response($result);
    }
}
