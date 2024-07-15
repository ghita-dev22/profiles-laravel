<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private const CACHE_key ='profiles_api';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // return Profile::withTrashed()->get();
        // $profiles=Profile::all();
        // return response()->json($profiles);
       // return Profile::paginate(10);
       Cache::delete(self::CACHE_key);
      dd(DB::table('publications')->join('profile','publications.id','=','profile.id')->get());
       $profiles=Cache::remember(self::CACHE_key,14400,function(){
        return ProfileResource::collection(Profile::all());
       });
        return $profiles;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($request->password);
        $profile= Profile::create($formFields);
        Cache::forget(self::CACHE_key);
        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
          return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        
        $formFields = $request->all();
        
        $formFields['password'] = Hash::make($request->password);
        $profile->fill($formFields)->save();
        Cache::forget(self::CACHE_key);
        return new ProfileResource($profile);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        Cache::forget(self::CACHE_key);
        return response()->json([
       'message'=>'le profile est bien supprimer',
       'id'=>$profile->id,
       'errors'=>[]
    ]);
    }
}
