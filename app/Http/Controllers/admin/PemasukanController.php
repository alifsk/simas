<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\SumberDana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use Dompdf\Dompdf;

class PemasukanController extends Controller
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

        return view('admin.pemasukan', ['sumber_dana' => $sumber_dana, 'total_pemasukan' => $total_pemasukan]);
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

        $data = Pemasukan::updateOrCreate(
            ['id' => $id],
            [
                'tgl_pemasukan' => $request->tgl_pemasukan,
                'sumber_dana_id' => $request->sumber_dana_id,
                'jumlah_pemasukan' => $request->jumlah_pemasukan,
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
        $data = Pemasukan::where($where)->first();

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
        $delete = Pemasukan::where('id', $id)->delete();

        return response()->json($delete);
    }

    public function rekapitulasi()
    {
        return view('admin.laporan_rekapitulasi');
    }

    public function cetakPertanggal(Request $request)
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
        $pemasukanPertanggal = DB::table('pemasukan')
            ->join('sumber_dana', 'sumber_dana.id', '=', 'pemasukan.sumber_dana_id')
            ->select([
                'pemasukan.id as id',
                'pemasukan.tgl_pemasukan as tgl',
                'sumber_dana.nama as sumber_dana',
                'pemasukan.jumlah_pemasukan as jumlah',
                'pemasukan.keterangan as ket'
            ])
            ->whereBetween('tgl_pemasukan', [$tglAwal, $tglAkhir])->get();
        // dd($pemasukanPertanggal);

        $total = DB::table('pemasukan')
            ->select('jumlah_pemasukan')
            ->whereBetween('tgl_pemasukan', [$tglAwal, $tglAkhir])
            ->sum('jumlah_pemasukan');

        return view('admin.print_pemasukan', compact('pemasukanPertanggal', 'total', 'total_pemasukan', 'total_pengeluaran', 'saldo'));
    }

    // public function printpdf()
    // {
    //     $pemasukanPetanggal = DB::table('pemasukan')
    //         ->join('sumber_dana', 'sumber_dana.id', '=', 'pemasukan.sumber_dana_id')
    //         ->select([
    //             'pemasukan.id',
    //             'pemasukan.tgl_pemasukan',
    //             'sumber_dana.nama',
    //             'pemasukan.jumlah_pemasukan',
    //             'pemasukan.keterangan'
    //         ]);

    //     $html = view('admin.print_pemasukan', $pemasukanPetanggal);

    //     // instantiate and use the dompdf class
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml($html);

    //     // (Optional) Setup the paper size and orientation
    //     $dompdf->setPaper('A4', 'landscape');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser
    //     $dompdf->stream();
    // }
}
