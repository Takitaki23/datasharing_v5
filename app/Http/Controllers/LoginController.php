<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required | email ',
            'password' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        // updated check if return is email and pass then validate
        if(! $user){
            throw ValidationException::withMessages([
                'email' => ['These email credentials do not match our records'],
            ]);
            return response()->json([
                'status' => false,
                'message' => 'failed',
            ],401);
        }elseif (! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['These password credentials do not match our records'],
            ]);
            return response()->json([
                'status' => false,
                'message' => 'failed',
            ],401);
        }


        // if (! $user || ! Hash::check($request->password, $user->password)) {
        //     throw ValidationException::withMessages([
        //         'email' => ['These credentials do not match our records'],
        //     ]);
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'failed',
        //     ],401);
        // }
        
        $token = $user->createToken('API TOKEN')->plainTextToken;
        
        return response()->json([
            'status' => true,
            'message' => 'success',
            'token' => $token,
            'credentials' => $user
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
