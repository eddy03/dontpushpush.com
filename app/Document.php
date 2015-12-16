<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function documentPath()
    {
        return 'document';
    }

    public function generateFilename($request)
    {
        return date('d-m-Y-h-i-A') . '___' .  $request->file('file')->getClientOriginalName();
    }
}
