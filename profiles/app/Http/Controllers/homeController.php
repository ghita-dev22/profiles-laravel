<?php

namespace App\Http\Controllers;

use App\Mail\ProfilMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class homeController extends Controller
{
    public function index(Request $request){
     //  $nom =$request->nom;
    //    $lastCount=$request->session()->get('compteur',0);
    //    $request->session()->put('compteur',$lastCount+1);
    //    $compteur=$request->session()->get('compteur');
     $compteur=$request->session()->increment('compteur',1);
   // $request->session()->push('user',[]...);
   $request->session()->forget('compteur');
//    $mailler = new ProfilMail();
//    //dd($mailler);
//    Mail::to('r@gmail.com')->send($mailler);

//         return view('home',compact('mailler'));
//     }
return view('home',compact('compteur'));
}
}
