<?php

namespace App\Http\Controllers\admin;

use App\Day;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkTimeController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        foreach ($request->days as $day) {
            for ($counter = 1; $counter < sizeof($request->ws) + 1; $counter++) {
                (Day::find($day))->workTimes()->create([
                   'start'=>$request->ws[$counter],
                   'end'=>$request->we[$counter]
                ]);

            }
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
