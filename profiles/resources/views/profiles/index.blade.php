{{-- @extends('component.master')
@section('title')  
 profile
@endsection
@section('main')
    


@endsection --}}
<x-master title="profile">
    <h3>Profiles</h3>
   
    {{-- <table class="table">
     
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Bio</th>
                <th>Actions</th> 
            </tr> 
       
      
    {{-- @section('main') --}}
     {{-- @foreach($profiles as $profile)
    <tr>
        <td>{{$profile->id}}</td>
        <td>{{$profile->name}}</td>
        <td>{{$profile->email}}</td>
        <td>{{$profile->password}}</td>
        <td>{{ Str::limit ($profile->bio,30)}}</td>
        <td><a
          
            class="btn btn-primary"
            href="{{route('profiles.show',$profile->id)}}"
            role="button"
            >Afficher plus</a
        >
        </td> 
    </tr>
    @endforeach
   

</table>   --}}
  
<div class="row my-5">
    @foreach ($profiles as $profile)
 <x-card :profile="$profile"/> 
@endforeach
</div>

 {{ $profiles->links() }}

</x-master>