<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Users::all();
        return $user;
    }

    /**
     * Register Admin Account.
     */
    public function register(Request $request)
    {
        // Validating Registration Inputs
        $validator = Validator::make($request->all(),[
            'firstName'=> 'required|min:2|max:255',
            'lastName'=> 'required|min:2|max:255',
            'role'=> 'required',
            'email'=> 'required|unique:users,email|email|max:255',
            'password'=> 'required|min:2|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        } else {
            $user= new Users();
            $user->firstName= $request->input("firstName");
            $user->lastName= $request->input("lastName");
            $user->role= $request->input("role");
            $user->email= $request->input("email");
            $user->password= Hash::make($request->input("password"));
            $user->save();

        }
        return response()->json([
            'status'=> 200,
            'message'=> 'User added successfully!',
        ]);

    }

    public function login(Request $request)
    {
        //
        $user= Users::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)) {
            return ["error"=> "Email or password is incorrect"];
        }
        return response()->json([
            'status'=> 200,
            'message'=> "Login Successfully",
            'user'=> $user
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Users::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(),[
            'firstName'=> 'required|min:2|max:255',
            'lastName'=> 'required|min:2|max:255',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'validate_err'=> $validator->messages(),
            ]);
        } else {
            $user=Users::find($id);
            $user->update($request->all());
        }



        return response()->json([
            'status'=> 200,
            'message'=> "User update successfully!",
            'user'=> $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $user = Users::find($id);
        $user->delete();
    }
}
