<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PengeluaranController extends Controller
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

        return view('admin.pengeluaran', ['total_pengeluaran' => $total_pengeluaran]);
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

        $data = Pengeluaran::updateOrCreate(
            ['id' => $id],
            [
                'tgl_pengeluaran' => $request->tgl_pengeluaran,
                'jumlah_pengeluaran' => $request->jumlah_pengeluaran,
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
        $data = Pengeluaran::where($where)->first();

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
        $delete = Pengeluaran::where('id', $id)->delete();

        return response()->json($delete);
    }

    public function rekapitulasi()
    {
        return view('admin.laporan_rekapitulasi');
    }

    public function print(Request $request)
    {
        $total_pemasukan = Pemasukan::sum('jumlah_pemasukan');
        $total_pemasukan = "Rp" . number_format($total_pemasukan, 0, ',', '.');
        $total_pengeluaran = Pengeluaran::sum('jumlah_pengeluaran');
        $total_pengeluaran = "Rp" . number_format($total_pengeluaran, 0, ',', '.');
        $saldo = DB::table('pemasukan')->sum('jumlah_pemasukan') - DB::table('pengeluaran')->sum('jumlah_pengeluaran');
        $saldo = "Rp" . number_format($saldo, 0, ',', '.');

        $tglAwal = $request->input('tglAwal');
        $tglAkhir = $request->input('tglAkhir');

        // dd(["Tanggal Awal : " . $tglAwal, "Tanggal Akhir : " . $tglAkhir]);
        $pengeluaranPertanggal = DB::table('pengeluaran')
            ->select([
                'pengeluaran.id as id',
                'pengeluaran.tgl_pengeluaran as tgl',
                'pengeluaran.jumlah_pengeluaran as jumlah',
                'pengeluaran.keterangan as ket'
            ])
            ->whereBetween('tgl_pengeluaran', [$tglAwal, $tglAkhir])->get();
        // dd($pengeluaranPertanggal);

        $total = DB::table('pengeluaran')
            ->select('jumlah_pengeluaran')
            ->whereBetween('tgl_pengeluaran', [$tglAwal, $tglAkhir])
            ->sum('jumlah_pengeluaran');

        return view('admin.print_pengeluaran', compact('pengeluaranPertanggal', 'total', 'total_pemasukan', 'total_pengeluaran', 'saldo'));
    }
}
