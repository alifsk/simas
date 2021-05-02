<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JenisZakat;
use App\Models\Zakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class ZakatController extends Controller
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
        $jenis_zakat = JenisZakat::all();

        $zakat = DB::table('zakat')
            ->join('jenis_zakat', 'jenis_zakat.id', '=', 'zakat.jenis_zakat_id')
            ->select([
                'zakat.id',
                'jenis_zakat.nama',
                'zakat.tgl',
                'zakat.pembayar',
                'zakat.keterangan'
            ]);
        if ($request->ajax()) {
            return datatables()->of($zakat)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="print" data-id="' . $data->id . '" class="btn-print btn btn-warning btn-sm"><i class="fa fa-print" aria-hidden="true"></i> Print</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.zakat', ['jenis_zakat' => $jenis_zakat]);
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

        $data = Zakat::updateOrCreate(
            ['id' => $id],
            [
                'jenis_zakat_id' => $request->jenis_zakat_id,
                'tgl' => $request->tgl,
                'pembayar' => $request->pembayar,
                'keterangan' => $request->keterangan,
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
        $data = Zakat::where($where)->first();

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
        $delete = Zakat::where('id', $id)->delete();

        return response()->json($delete);
    }

    public function print($id)
    {
        $zakat = DB::table('zakat')
            ->join('jenis_zakat', 'jenis_zakat.id', '=', 'zakat.jenis_zakat_id')
            ->where('zakat.id', $id)
            ->select([
                'zakat.id as id_zakat',
                'zakat.tgl as tgl',
                'jenis_zakat.nama as jenis_zakat',
                'zakat.pembayar as nama',
                'zakat.keterangan as ket'
            ])
            ->get();

        // dd($zakat);

        // $pdf = PDF::loadView('admin.print_zakat', compact('zakat'))->setPaper('a4', 'landscape');
        // return $pdf->stream();
        return view('admin.print_zakat', compact('zakat'));
    }
}
