<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estimation;
use Illuminate\Support\Facades\Validator;

class EstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estimations = Estimation::all();
        return $estimations;
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
            // Validate Inquries Inputs
            $validator = Validator::make($request->all(),[
                'name'=> 'required|min:2|max:255',
                'email'=> 'required|email||max:255',
                'floor_size'=> 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'validate_err'=> $validator->messages(),
                ]);
            } else {
                $estimation = new Estimation();
                $estimation->name = $request->input('name');
                $estimation->email = $request->input('email');
                $estimation->floor_size = $request->input('floor_size');
                $estimation->services = $request->input('services');
                $estimation->house_type = $request->input('house_type');
                $estimation->number_floors = $request->input('number_floors');
                $estimation->painting_design = $request->input('painting_design');
                $estimation->save();

                // if ($estimation->services ='Whole Construction') {
                //     return response()->json([
                //         'result'=> ($estimation->floor_size * 5)
                //     ]);
                // }
            }

            //




            return response()->json([
                'status'=> 200,
                'message'=> 'Estimation sent successfully',
            ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Estimation::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $estimations = Estimation::find($id);
        $estimations->delete();
    }
}
