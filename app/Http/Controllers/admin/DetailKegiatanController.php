<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DetailKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
                'detail_kegiatan.id as id_kegiatan',
                'detail_kegiatan.foto as foto_kegiatan',
                'kegiatan.nama_kegiatan as nama_kegiatan',
            ]);
        

        if ($request->ajax()) {
            return datatables()->of($detail_kegiatan)
                ->addColumn('action', function ($data) {
                    $button = '<button data-id="' . $data->id_kegiatan . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id_kegiatan . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';
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
        // Get data from request
        $id = $request->id;
        $kegiatan_id = $request->kegiatan_id;

        // Check if photo is exist or empty
        if (!$request->file('foto')) {
            // If photo is empty
            $data = DetailKegiatan::updateOrCreate(
                ['id' => $id],
                [
                    'kegiatan_id' => $request->kegiatan_id
                ]
            );
        } else {
            // Validate photo rules
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Get photo
            $files = $request->file('foto');

            // Set filename
            $fileName = 'detail_kegiatan_' .date('YmdHis'). '.' .$files->getClientOriginalExtension();

            // If photo is exist on storage, delete old photo
            if ($id != null) {
                $detail_foto = DetailKegiatan::where('id',$id)->first();

                Storage::delete('public/detailKegiatan/'.$detail_foto->foto);
            }

            // Save photo to storage
            $files->storeAs('public/detailKegiatan', $fileName);
    
            // Save or update all data to DB
            $data = DetailKegiatan::updateOrCreate(
                ['id' => $id],
                [
                    'kegiatan_id' => $request->kegiatan_id,
                    'foto' => $fileName,
                ]
            );
        }

        // Return response
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
        // Delete photo on storage
        $data = DetailKegiatan::where('id', $id)->first();
        Storage::delete('public/detailKegiatan/'.$data->foto);

        // Delete data on DB
        $delete = DetailKegiatan::where('id', $id)->delete();

        return response()->json($delete);
    }
}
