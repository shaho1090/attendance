<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AttendanceFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd('ready for uploading');
        return view('admin.attendanceFiles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attendanceFiles.create',
            [
                'file_content' => '',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('attendanceFile');//->store('attendanceFiles');

        $fileDate = $request->get('file_date');
        // save to storage/app/attendanceFile as the new $filename
        $path = $file->storeAs('attendanceFiles'.'/'. date('Y-m' ,strtotime($fileDate)), date('d' ,strtotime($fileDate)).'.csv');
        // dd($path);
        $path = '../storage/app/'.$path;
        $fileContent = File::get(storage_path($path));
       // $array_maped = array_map('str_getcsv',$fileContent);



        // Open the file for reading
        if (($h = fopen( $path, "r")) !== FALSE)
        {
            // Convert each line into the local $data variable
            while (($data = fgetcsv($h, 1000, ",")) !== FALSE)
            {
                dump($data);
            }

            // Close the file
            fclose($h);
        }


        dd($fileContent);

        return view('admin.attendanceFiles.create',['file_content'=> $fileContent]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
