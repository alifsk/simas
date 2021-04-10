<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class UserSholatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();

        $imam = DB::table('imam_sholat')
            ->join('users', 'users.id', '=', 'imam_sholat.users_id')
            ->select([
                'imam_sholat.id',
                'imam_sholat.hari',
                'users.name',
                'imam_sholat.muadzin'
            ])->get();

        $cities = Http::get('https://api.banghasan.com/sholat/format/json/kota')->json()['kota'];

        // if ($request->ajax()) {
        //     return datatables()->of($imam)
        //         ->addColumn('action', function ($data) {
        //             $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $data->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>';
        //             $button .= '&nbsp;&nbsp;';
        //             $button .= '<button type="button" name="delete" id="' . $data->id . '" class="delete btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>';
        //             return $button;
        //         })
        //         ->rawColumns(['action'])
        //         ->addIndexColumn()
        //         ->make(true);
        // }

        return view('user.imam', ['users' => $users, 'imam' => $imam, 'cities' => $cities]);
    }

    public function result(Request $request)
    {
        $city = explode('-', $request->city);
        $date = $request->time;
        
        $schedule['city_name'] = $city[1];
        $schedule['data'] = Http::get('https://api.banghasan.com/sholat/format/json/jadwal/kota/' . $city[0] . '/tanggal/' . $date)->json()['jadwal']['data'];

        return response($schedule);
    }
}
