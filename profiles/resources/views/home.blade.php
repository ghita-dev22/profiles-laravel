{{-- @extends('partials.layouts.master')

@section('title', 'Accueil') --}}
{{-- <x-master title="page-d'acceuil"> --}}
    {{-- @section('main') --}}
   {{-- <x-alert type="warning">
   
    <strong>salam</strong>
   </x-alert>
  --}}
  <x-master title="page-d'acceuil">
    <h3>Home</h3>
    <h4>page visitée ({{$compteur}}) fois.</h4>

    {{-- @if(isset($mailler))
        <p>Contenu de l'email : {{ $mailler->body }}</p>
    @else
        <p>Aucune donnée d'email à afficher pour l'instant.</p>
    @endif --}}
</x-master>


    {{-- {{-- <x-users-table :users="$users" 
                    nom="sidad"/> --}}
{{-- @endsection --}}
{{-- </x-master> --}} 