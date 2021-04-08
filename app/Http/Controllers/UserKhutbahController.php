<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserKhutbahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();

        $khutbah = DB::table('khutbah_jumat')
            ->join('users', 'users.id', '=', 'khutbah_jumat.users_id')
            ->select([
                'khutbah_jumat.id',
                'khutbah_jumat.tgl',
                'users.name',
                'khutbah_jumat.topik'
            ])->get();

        // if ($request->ajax()) {
        //     return datatables()->of($khutbah)
        //         ->addColumn('action', function ($data) {
        //             $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit-post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
        //             $button .= '&nbsp;&nbsp;';
        //             $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';
        //             return $button;
        //         })
        //         ->rawColumns(['action'])
        //         ->addIndexColumn()
        //         ->make(true);
        // }

        return view('user.jumat', ['users' => $users, 'khutbah' => $khutbah]);
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
