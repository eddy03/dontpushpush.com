<?php

namespace App\Http\Controllers\Ext;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use SSH;

/**
 * Class HomepageController
 * @package App\Http\Controllers\Ext
 */
class HomepageController extends Controller
{
    /**
     * Homepage of http://dontpushpush.com
     *
     * @return string
     */
    public function homepage()
    {
        $size = 300;
        $default = "";
        $email = "eddytech03@gmail.com";
        $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

        return view('ext.homepage')
            ->withGrav($grav_url);
    }

    /**
     * Show authentication form
     *
     * @return string
     */
    public function login()
    {
        return view('ext.login');
    }

    /**
     * Authenticate the user
     *
     * @param LoginFormRequest $request
     */
    public function authenticate(LoginFormRequest $request)
    {
        if (Auth::attempt(['email' => $request->emel, 'password' => $request->password])) {
            return redirect()->intended('administrator');
        }
        else {
            return redirect('auth');
        }
    }
}