<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapitulasiController extends Controller
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
        // dd($total_pengeluaran);
        $total_pengeluaran = "Rp" . number_format($total_pengeluaran, 0, ',', '.');

        // $view = DB::table('pemasukan')
        //     ->innerjoin('pengeluaran')
        //     ->select([
        //         'pemasukan.id',
        //         'pemasukan.tgl_pemasukan',
        //         'pemasukan.jumlah_pemasukan',
        //         'pemasukan.keterangan'
        //     ])->ON('pemasukan.id', '=', 'pengeluaran.id');
        //         SELECT pemasukan.tgl_pemasukan, pemasukan.jumlah_pemasukan, pemasukan.keterangan
        // FROM pemasukan INNER JOIN pengeluaran
        // ON pemasukan.id = pengeluaran.id

        return view('admin.rekapitulasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
