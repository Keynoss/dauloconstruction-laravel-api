<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataModel;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = DataModel::all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function visit()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = new DataModel();
        $data->page = $request->page;
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->url_image = $request->url_image;
        $data->save();
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = DataModel::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = DataModel::find($id);
        $data->page = $request->page;
        $data->title = $request->title;
        $data->desc = $request->desc;
        $data->url_image = $request->url_image;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $data = DataModel::find($id);
        $data->delete();
    }
}
