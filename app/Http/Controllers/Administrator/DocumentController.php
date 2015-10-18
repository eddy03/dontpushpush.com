<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $documentPath = $this->documentPath();
        $path = public_path() . DIRECTORY_SEPARATOR . $documentPath;
        $files = File::files($path);

        if($request->ajax()) {

            foreach($files as $file) {
                $ajaxFile[] = asset($documentPath . str_replace($path, '', $file));
            }

            return $ajaxFile;
        }
        else {
            return view('administrator.document.index', compact('files', 'path', 'documentPath'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')) {

            if($request->file('file')->isValid()) {

                $request->file('file')->move($this->documentPath(), $this->generateFilename($request));

            }

        }

        return redirect()->route('administrator.document.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return $this->index();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . $this->documentPath();
        $filename = base64_decode($id);

        if(File::exists($path . $filename)) {
            if(File::delete($path . $filename)) {
                return ['success' => true];
            }
            else {
                return ['success' => false];
            }
        }
        else {
            return ['success' => false];
        }
    }

    private function documentPath()
    {
        return 'document';
    }

    private function generateFilename($request)
    {
        return date('d-m-Y-h-i-A') . '___' .  $request->file('file')->getClientOriginalName();
    }
}
