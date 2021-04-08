<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pengeluaran = Pengeluaran::all();
        $total_pengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
        // dd($total_pengeluaran);
        $total_pengeluaran = "Rp" . number_format($total_pengeluaran, 0, ',', '.');

        if ($request->ajax()) {
            return DataTables::of($pengeluaran)
                ->editColumn('jumlah_pengeluaran', function ($pengeluaran) {
                    $nominal = "Rp" . number_format($pengeluaran->jumlah_pengeluaran, 0, ',', '.');
                    return $nominal;
                })
                ->make(true);
        }

        return view('user.pengeluaran', ['total_pengeluaran' => $total_pengeluaran]);
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
