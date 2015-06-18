<?php

namespace App\Http\Controllers\Special;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KahwinController extends Controller
{
    public function mainpage() {

        return view('special.kahwin.kahwin');

    }
}
