<x-master title="profile">
    <h3>Profiles</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="card my-1 py-1">
                <img class="card-img-top w-25 mx-auto" src="{{ $profile->image }}" alt="Title" />
                <div class="card-body text-center">
                    <h4 class="card-title"># {{$profile->id}} {{$profile->name}}</h4>
                    <p class="card-text">{{$profile->created_at->format('d-m-y')}}</p>
                    <p class="card-text">Email: <a href="mailto:{{$profile->email}}">{{$profile->email}}</a></p>
                    <p class="card-text">{{$profile->bio}}</p>
                    
                </div>
            </div>
            <div class="row">
                <h3>Publications</h3>
                @foreach($profile->publications as $publication)
                <x-publication :publication="$publication"/>
                @endforeach
                
            </div>
            
        </div>
</x-master>