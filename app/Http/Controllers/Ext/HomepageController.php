<?php

namespace App\Http\Controllers\Ext;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{

    /**
     * Homepage of http://dontpushpush.com
     *
     * @return string
     */
    public function homepage() {

        return view('ext.homepage');

    }

    public function about() {

        return view('ext.about');

    }


    /**
     * Show authentication form
     *
     * @return string
     */
    public function authenticate() {

        return 'Login Page';

    }
}
