<x-master title="My-profile">
    <h3>Modifier profile</h3>

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

    <form method="POST" action="{{ route('profiles.update', $profile->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nom complet</label>
            <input type="text" class="form-control" value="{{ old('name', $profile->name) }}" name="name"/>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ old('email', $profile->email) }}" name="email"/>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password"/>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirmer votre mot de passe</label>
            <input type="password" class="form-control" name="password_confirmation"/>
        </div>

        <div class="mb-3">
            <label class="form-label">Biographie</label>
            <textarea class="form-control" name="bio">{{ old('bio', $profile->bio) }}</textarea>
        </div>

        
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image"/>
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary btn-block">Modifier</button>
        </div>
    </form>
</x-master>

  