<?php

namespace App\Http\Controllers\Administrator;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard() {

        return view('administrator.dashboard');

    }

    /**
     * @return mixed
     */
    public  function logout() {

        Auth::logout();

        return redirect()->route('homepage');;

    }
}
