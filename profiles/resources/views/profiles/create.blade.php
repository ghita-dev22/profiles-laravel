<x-master title="My-profile">
    <h3>Ajouter profile</h3>
    @if($errors->any())
    
    <x-alert type="danger">
        <h6>Errors: </h6>
        <ul>
            @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            
            @endforeach
        </ul>
    </x-alert>
    
   
       
    @endif


    <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nom complet</label>
        <input
            type="text"
            class="form-control"
            value="{{old('name')}}"
            name="name"/>
            @error('name')
            <div class="text-danger">{{$message}}</div>    
            @enderror
    
    </div>
    <div class="mb-3">
        <label class="form-label">email</label>
        <input
            type="email"
            class="form-control"
            value="{{old('email')}}"
            name="email"/>
            @error('email')
            <div class="text-danger">{{$message}}</div>    
            @enderror
    </div>
    <div class="mb-3">
        <label class="form-label">mot de passe</label>
        <input
            type="password"
            class="form-control"
            value="{{old('password')}}"
            name="password"
        
        />
    
    </div>
    <div class="mb-3">
        <label class="form-label">confirmer votre mot de passe</label>
        <input
            type="password"
            class="form-control"
            value="{{old('password_confirmation')}}"
            name="password_confirmation"
        
        />
    
    </div>
    <div class="mb-3">
        <label class="form-label">biographie</label>
        <textarea
          
            class="form-control"
           
            name="bio">"{{old('bio')}}"
        
        </textarea>
    
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input
            type="file"
            class="form-control"
    
            name="image"
        
        />
    <div class="d-grid my-2">
        <button
        type="submit"
        class="btn btn-primary btn-block"
    >
      Ajouter
    </button>
    


    </div>
</form>
  


   
   
       
    
   
              
       


</x-master>