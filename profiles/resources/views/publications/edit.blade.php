<x-master title="My-profile">
    <h3>Modifier publication</h3>

    @if($errors->any())
        <x-alert type="danger">
            <h6>Erreurs :</h6>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-alert>
    @endif

    <form method="POST" action="{{ route('publications.update', $publication->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">titre</label>
            <input type="text" class="form-control" value="{{ old('titre', $publication->titre) }}" name="titre"/>
            @error('titre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>




        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea class="form-control" name="body">{{ old('boby', $publication->body) }}</textarea>
        </div>

       
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image"/>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            <div>
                <img class="my-2" src="{{ asset('storage/' . $publication->image) }}" width="70" alt="">
            </div>
        </div>
        

        <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary btn-block">Modifier</button>
        </div>
    </form>
</x-master>