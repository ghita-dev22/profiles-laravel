<div class="col-sm-4">
    <div class="card">
     
        <img class="card-img-top" src="{{ $profile->image }}" alt="Title">
 

        <div class="card-body">
            <h4 class="card-title">{{$profile->name}}</h4>
            <p class="card-text">{{Str::limit($profile->bio,50)}}</p>
            <a href="{{ route('profiles.show', $profile->id) }}" class="stretched-link"></a>
      </div>
        <br>
            <div class="card">
                <div class="card-footer border-1 bg-light" style="z-index: 9 " >
                    <form action="{{route('profiles.destroy',$profile->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger  float-end">
                        supprimer
                       </button>
                    </form>
                
                   
                 <div bg-light" style="z-index: 9 " >
                
                    <form action="{{route('profiles.edit',$profile->id)}}" method="GET">
                        @method('PUT')
                        @csrf
                        <button class="btn btn-primary ">
                        modifier
                       </button>
                    </form>
                </div> 
                
            </div> 
           
            </div>
            
        </div>
  
</div>

