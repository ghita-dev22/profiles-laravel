<x-master title="My-profile">
    <h3>Ajouter publication</h3>
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


    <form method="POST" action="{{ route('publications.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">titre</label>
        <input
            type="text"
            class="form-control"
            value="{{old('titre')}}"
            name="titre"/>
            @error('titre')
            <div class="text-danger">{{$message}}</div>    
            @enderror
    
    </div>
    


    <div class="mb-3">
        <label class="form-label">body</label>
        <textarea
          
            class="form-control"
           
            name="body">"{{old('body')}}"
        
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