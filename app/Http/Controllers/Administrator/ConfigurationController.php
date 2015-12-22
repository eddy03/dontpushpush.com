<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ConfigurationController extends Controller
{
    public function showConfigurationsOptions()
    {
        return view('administrator.configuration.listOptions');
    }
}
