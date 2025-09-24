<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProfileRquest;
use App\Http\Requests\updateProfileRquest;
use App\Models\profile ;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function index(request $request)
    {
       $profile = Profile::all();
           return response()->json($profile, 200);
    }
  public function store(StoreProfileRquest $request)
    {
        $profile = Profile::create($request->validated());
        return response()->json($profile, 201);
    }
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        return response()->json($profile, 200);
    }
    public function update(updateProfileRquest $request, $id)
    {
        $profile = Profile::findOrFail($id);
        $profile->update($request->validated());
        return response()->json($profile, 200);
    }
    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();
        return response()->json(null, 204);
    }
    public function getUserProfile($userId)
    {
        $profile = Profile::where('user_id', $userId)->first();

        if ($profile) {
            return response()->json($profile, 200);
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
    public function searchProfiles(Request $request)
    {
        $query = Profile::query();

        if ($request->has('phone')) {
            $query->where('phone', 'like', '%' . $request->input('phone') . '%');
        }

        if ($request->has('address')) {
            $query->where('address', 'like', '%' . $request->input('address') . '%');
        }

        if ($request->has('birthdate')) {
            $query->whereDate('birthdate', $request->input('birthdate'));
        }

        if ($request->has('bio')) {
            $query->where('bio', 'like', '%' . $request->input('bio') . '%');
        }

        $profiles = $query->get();

        return response()->json($profiles, 200);
    }
    
}
