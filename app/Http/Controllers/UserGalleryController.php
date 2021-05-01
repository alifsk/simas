<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailKegiatan;
use App\Models\JenisKegiatan;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\DB;

class UserGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['jenis_kegiatan'] = JenisKegiatan::orderBy('nama', 'asc')->get();
        $data['kegiatan'] = DB::table('detail_kegiatan as detail')
            ->join('kegiatan as kegiatan', 'detail.kegiatan_id', '=', 'kegiatan.id')
            ->join('jenis_kegiatan as jenis', 'kegiatan.jenis_kegiatan_id', '=', 'jenis.id')
            ->orderBy('detail.id', 'desc')
            ->select('detail.id as image_id', 'detail.foto as image', 'kegiatan.nama_kegiatan as name', 'jenis.nama as category')
            ->paginate(6);

        return view('user.gallery', $data);
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
