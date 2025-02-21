<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['user'=>UserResource::collection(User::all())]);
    }

    public function create(Request $request)
    {
        $user = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
        ]);


    }
}
