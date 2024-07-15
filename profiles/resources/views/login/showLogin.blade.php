 <x-master title="se connecter">
    <h3>Authentification</h3>
        <form method="POST" action="{{route('login')}}">
        @csrf
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input
            type="email"
            class="form-control"
            value="{{old('email')}}"
        
            name="email"/>
            @error('email')
            <spam class="text-danger">{{$message}}</spam>
                
            @enderror
          
    </div>
    <div class="mb-3">
        <label class="form-label">mot de passe</label>
        <input
            type="password"
            class="form-control"
            
            name="password"
        
        />
        <div class="d-grid my-2">
            <button
            type="submit"
            class="btn btn-primary btn-block"
        >
          se connecter
        </button>
    </form>
</x-master> 