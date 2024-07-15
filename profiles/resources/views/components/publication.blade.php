<div class="card my-2 bg-light">
    <div class="card-body">
        
        
        @can('update',$publication)
            <a class="float-end btn btn-primary btn-sm" href="{{ route('publications.edit', $publication->id) }}">Modifier</a>
        @endcan
         
        @can('delete',$publication)
            <form action="{{ route('publications.destroy', $publication->id) }}" method="post">
                @csrf
                @method("DELETE")
                <button onclick="return confirm('Voulez-vous vraiment supprimer cette publication ?')" class="mx-2 float-end btn btn-danger btn-sm">Supprimer</button>
            </form>
        @endcan
        
        <blockquote class="blockquote mb-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img class="rounded-circle" src="{{ asset($publication->profile->image) }}" width="55px" alt="Image du profil">
                    </div>
                    <div class="col">
                        <p>{{ $publication->profile ? $publication->profile->name : 'Profil non défini' }}</p>
                        <a href="{{ route('profiles.show', $publication->profile->id) }}" class="stretched-link"></a>
                       
                        <p>{{ $publication->titre }}</p>
                        
                    </div>
                </div>
                
                <p>{{ $publication->body }}</p>
                <footer class="footer">
                    <img class="img-fluid" src="{{ asset('storage/' . $publication->image) }}" alt="Image de la publication">
                </footer>
            </div>
        </blockquote>
      
    </div>
</div>
