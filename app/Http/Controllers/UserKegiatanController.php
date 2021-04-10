<?php

namespace App\Http\Controllers;

use App\Models\JenisKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $jenis_kegiatan = JenisKegiatan::all();

        $kegiatan = DB::table('kegiatan')
            ->join('jenis_kegiatan', 'jenis_kegiatan.id', '=', 'kegiatan.jenis_kegiatan_id')
            ->select([
                'kegiatan.id',
                'kegiatan.tgl',
                'jenis_kegiatan.nama',
                'kegiatan.nama_kegiatan',
                'kegiatan.deskripsi'
            ])
            ->orderBy('kegiatan.tgl', 'desc')
            ->paginate(3);

        return view('user.kegiatan', ['kegiatan' => $kegiatan, 'jenis_kegiatan' => $jenis_kegiatan]);
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
