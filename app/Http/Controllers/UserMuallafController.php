<?php

namespace App\Http\Controllers;

use App\Models\Muallaf;
use Illuminate\Http\Request;

class UserMuallafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $muallaf = Muallaf::all();

        return view('user.muallaf', compact('muallaf'));
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
        $id = $request->id;

        $data = Muallaf::updateOrCreate(
            ['id' => $id],
            [
                'nama' => $request->nama,
                'ktp' => $request->ktp,
                'jk' => $request->jk,
                'lahir' => $request->lahir,
                'tgl' => $request->tgl,
                'pekerjaan' => $request->pekerjaan,
                'agama' => $request->agama,
                'kebangsaan' => $request->kebangsaan,
                'email' => $request->email,
                'telp' => $request->telp,
                'alamat' => $request->alamat,
                'domisili' => $request->domisili,
                'pernyataan1' => $request->pernyataan1,
                'pernyataan2' => $request->pernyataan2,
                'pernyataan3' => $request->pernyataan3,
            ]
        );

        return response()->json($data);
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
