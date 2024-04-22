<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use Illuminate\Support\Facades\Validator;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Projects::all();
        return $projects;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'city'=> 'required',
            'project_title'=> 'required',
            'location'=> 'required|min:2|max:70',
            'desc'=> 'required|min:5|max:200',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        } else {
            $projects = new Projects();
            $projects->city = $request->input('city');
            $projects->project_title = $request->input('project_title');
            $projects->location = $request->input('location');
            $projects->desc = $request->input('desc');
            $projects->url_image = $request->input('url_image');
            $projects->save();
        }

        return response()->json([
            'status'=> 200,
            'message'=> 'Project added successfully!',
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Projects::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),[
            'city'=> 'required',
            'project_title'=> 'required',
            'location'=> 'required|min:2|max:70',
            'desc'=> 'required|min:5|max:200',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        } else {
            $projects=Projects::find($id);
            $projects->update($request->all());
        }



        return response()->json([
            'status'=> 200,
            'message'=> "Project update successfully!",
            'projects'=> $projects
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $projects = Projects::find($id);
        $projects->delete();

    }
}
