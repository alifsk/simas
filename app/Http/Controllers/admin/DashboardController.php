<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\User;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total_pemasukan = Pemasukan::sum('jumlah_pemasukan');
        $total_pemasukan = "Rp" . number_format($total_pemasukan, 0, ',', '.');
        $total_pengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
        $total_pengeluaran = "Rp" . number_format($total_pengeluaran, 0, ',', '.');
        $saldo = DB::table('pemasukan')->sum('jumlah_pemasukan') - DB::table('pengeluaran')->sum('jumlah_pengeluaran');
        $saldo = "Rp" . number_format($saldo, 0, ',', '.');
        // dd($saldo);
        $kegiatan = Kegiatan::count();
        $zakat = Zakat::count();
        $user = User::count();

        $pemasukan = DB::table('pemasukan')
            ->join('sumber_dana', 'sumber_dana.id', '=', 'pemasukan.sumber_dana_id')
            ->select([
                'pemasukan.id',
                'pemasukan.tgl_pemasukan',
                'sumber_dana.nama',
                'pemasukan.jumlah_pemasukan',
                'pemasukan.keterangan'
            ]);

        $pengeluaran = Pengeluaran::all();

        return view('admin.dashboard', compact('total_pemasukan', 'total_pengeluaran', 'kegiatan', 'zakat', 'user', 'pengeluaran', 'pemasukan', 'saldo'));
    }

    public function getChart()
    {
        // $dana = DB::select("SELECT DATE_FORMAT(tgl_pemasukan, '%M') AS `bulan`, SUM(`jumlah_pemasukan`) AS `total` FROM `pemasukan` GROUP BY `bulan` ORDER BY `id` ASC", []);

        // $result = DB::select("SELECT DATE_FORMAT(tgl_pengeluaran, '%M') AS `bulan`, SUM(`jumlah_pengeluaran`) AS `total` FROM `pengeluaran` GROUP BY `bulan` ORDER BY `id` ASC", []);

        $data['result_data'] = DB::select("SELECT MONTH(tgl) as bulan, SUM(jumlah_pemasukan) as data_pemasukan, SUM(jumlah_pengeluaran) as data_pengeluaran
                                            FROM (SELECT tgl_pengeluaran as tgl, 0 as jumlah_pemasukan, jumlah_pengeluaran FROM pengeluaran
                                            UNION SELECT tgl_pemasukan as tgl, jumlah_pemasukan, 0 as jumlah_pengeluaran FROM pemasukan) as tbl
                                            GROUP BY MONTH(tgl) 
                                            ORDER BY tgl ASC");

        return response($data);
    }
}
