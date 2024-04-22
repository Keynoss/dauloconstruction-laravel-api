<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Validator;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $inquiries = Inquiry::all();
        return $inquiries;
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
            'first_name'=> 'required|min:2|max:255',
            'last_name'=> 'required|min:2|max:255',
            'email'=> 'required|email||max:255',
            'phone'=> 'required|min:10|max:11',
            'address'=> 'required|min:10|max:255',
            'message_inquiry'=> 'required|min:5|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        } else {
            $inquiries = new Inquiry();
            $inquiries->first_name = $request->input('first_name');
            $inquiries->last_name = $request->input('last_name');
            $inquiries->email = $request->input('email');
            $inquiries->address = $request->input('address');
            $inquiries->phone = $request->input('phone');
            $inquiries->message_inquiry = $request->input('message_inquiry');
            $inquiries->save();
        }

        //



        return response()->json([
            'status'=> 200,
            'message'=> 'Message sent successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Inquiry::find($id);
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
        $inquiries = Inquiry::find($id);
        $inquiries->delete();
    }
}
