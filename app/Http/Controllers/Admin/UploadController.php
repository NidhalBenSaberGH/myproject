<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UploadRequest;
use App\Jobs\ImportCSVJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.upload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadRequest $request)
    {
        if ($request->post('type') == "video") {
            $command = 'kpeiz:import-videos';
        }
        elseif ($request->post('type') == 'comment') {
            $command = 'kpeiz:import-comments';
        }
        $file = $request->file('csvfile');
        if (!isset($file)) {
            Session::flush('file_uploaded', 'No file uploaded.');
            return redirect();
        }

        $csvpath = $file->getRealPath();

        ImportCSVJob::dispatch($request->post('type'), $csvpath)->onQueue('default');


        /*$call = Artisan::queue($command,[
            'csvPath' => $csvpath
        ]);*/
        $call = 0;
        if ($call !== 0)
            Session::flush('file_uploaded', 'Error while uploading csv file.');
        else
            Session::flash('file_uploaded', 'CSV file uploaded successfully and is processing, please wait...');

        return redirect('/admin/home');
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
