<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLayananController extends Controller
{
    public function zakat()
    {
        return view('user.zakat');
    }

    public function info()
    {
        return view('user.muallaf');
    }
}
