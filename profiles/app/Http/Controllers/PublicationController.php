<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class PublicationController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $publications=publication::latest()->paginate();
      return view('publications.index',compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('publications.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
       
        $formFields=$request->validated();
       
        $this->uploadImage($request,$formFields);
        $formFields['profile_id']=Auth::id();
       publication::create($formFields);
       return to_route('publications.index')->with('success', 'Votre publication a bien été créé.');
        
    }
    private function uploadImage(PublicationRequest $request,array &$formFields){
       
        unset($formFields['image']);
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('publication', 'public');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publication $publication, Request $request)
    {
    //   if(!Gate::allows('update-publication',$publication)){
    //     abort(403);
    //   }
         //Gate::authorize('update-publication',$publication);
        // $this->authorize('update',$publication);
        if(!($request->user()->can('update',$publication))){
             abort(403);
        }else{
        return view('publications.edit',compact('publication'));
    }
}

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, publication $publication)
    {
        $formFields = $request->validated();
        $this->uploadImage($request,$formFields);

       
        $publication->fill($formFields)->save();
        
        return to_route('publications.index')->with('success', 'Le profil a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publication $publication)
    {
        $publication->delete();
        return to_route('publications.index')->with('success','la publication est bien supprimer');
    }
}
