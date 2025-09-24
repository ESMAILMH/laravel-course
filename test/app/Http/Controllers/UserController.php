<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
       $user = User::all();
       return response()->json($user);
    }
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json($user, 201);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        return response()->json($user, 200);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
    
}
