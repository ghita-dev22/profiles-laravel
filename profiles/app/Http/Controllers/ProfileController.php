<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;

class ProfileController extends Controller
{
   public function index() {
     
   //  $profiles=Profile::all();
    //$profiles= Profile::paginate(9);
   
    $profiles=Cache::remember('profiles',10,function(){
      return Profile::paginate(9);
    });
   
      
    return view ('profiles.index',compact('profiles'));
   }
   public function show(Profile $profile){
     $cachePrefix = 'profile_'.$profile->id;
   
      Cache::remember($cachePrefix,10,function()use($profile){
        return Profile::findOrfaill($profile->id);
      });
      // $id=$request->id;
      // $profile=Profile::findOrFail($id);
    
      return view('profiles.show',compact('profile'));
   }
   public function create(){
      return view('profiles.create');
   }
   public function store(ProfileRequest $request)
   {
       $formFields = $request->validated();

       if ($request->filled('password')) {
           $formFields['password'] = Hash::make($request->password);
       }

       // Gestion de l'upload de l'image
       if ($request->hasFile('image')) {
           $formFields['image'] = $request->file('image')->store('profile', 'public');
       } else {
           $formFields['image'] = 'profile/profile.png'; // Utilisation de l'image par défaut
       }

       Profile::create($formFields);

       return redirect()->route('profiles.index')->with('success', 'Votre profil a bien été créé.');
   
   }
   public function destroy(Profile $profile){
      $profile->delete();
      return to_route('profiles.index')->with('success','votre profile est bien supprimer');
   }
   public function edit(profile $profile){
      
         return view('profiles.edit', compact('profile'));
     }
    
   public function update(ProfileRequest $request, Profile $profile)
    {
        $formFields = $request->validated();
        $formFields['password'] = Hash::make($request->password);

        unset($formFields['image']);
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('profile', 'public');
        }

        $profile->fill($formFields)->save();

        return redirect()->route('profiles.index')->with('success', 'Le profil a bien été modifié.');
    }

   }


