<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UserPemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sumber_dana = SumberDana::all();

        $total_pemasukan = Pemasukan::sum('jumlah_pemasukan');
        $total_pemasukan = "Rp" . number_format($total_pemasukan, 0, ',', '.');

        $pemasukan = DB::table('pemasukan')
            ->join('sumber_dana', 'sumber_dana.id', '=', 'pemasukan.sumber_dana_id')
            ->select([
                'pemasukan.id',
                'pemasukan.tgl_pemasukan',
                'sumber_dana.nama',
                'pemasukan.jumlah_pemasukan',
                'pemasukan.keterangan'
            ]);

        if ($request->ajax()) {
            return DataTables::of($pemasukan)
                ->editColumn('jumlah_pemasukan', function ($pemasukan) {
                    $satuan = "Rp" . number_format($pemasukan->jumlah_pemasukan, 0, ',', '.');
                    return $satuan;
                })
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('user.pemasukan', ['sumber_dana' => $sumber_dana, 'total_pemasukan' => $total_pemasukan]);
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
