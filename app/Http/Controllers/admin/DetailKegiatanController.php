<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DetailKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class DetailKegiatanController extends Controller
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
        $kegiatan = Kegiatan::all();

        $detail_kegiatan = DB::table('detail_kegiatan')
            ->join('kegiatan', 'kegiatan.id', '=', 'detail_kegiatan.kegiatan_id')
            ->select([
                'detail_kegiatan.id',
                'detail_kegiatan.foto',
                'kegiatan.nama_kegiatan',
            ]);

        if ($request->ajax()) {
            return datatables()->of($detail_kegiatan)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.detail_kegiatan', ['kegiatan' => $kegiatan]);
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

        $request->validate([
            'foto' => 'foto|mimes:jpeg, png, jpg, gif, svg|max:2048',
        ]);

        if ($files = $request->file('foto')) {
            //insert new file
            $destinationPath = public_path('foto'); // upload path
            $foto = date('YmdHis') . "." . $files->getClientOriginalExtension(); //upload original name
            $files->move($destinationPath, $foto);
            $insert['foto'] = "$foto";
            //save in database
            $image = new DetailKegiatan();
            $image->photo_name = "$foto";
            $image->save();
        }

        $data = DetailKegiatan::updateOrCreate(
            ['id' => $id],
            [
                'kegiatan_id' => $request->kegiatan_id,
                'foto' => $request->foto,
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
        $where = array('id' => $id);
        $data = DetailKegiatan::where($where)->first();

        return response()->json($data);
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
        $data = DetailKegiatan::where('id', $id)->first('foto');
        File::delete('public/foto/' . $data->foto);

        $delete = DetailKegiatan::where('id', $id)->delete();

        return response()->json($delete);
    }
}
