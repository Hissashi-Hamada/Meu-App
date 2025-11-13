<div class="card">
  <form
      action="{{ route('users.updateInterests', $user->id) }}" 
      method="POST"
  >
      @csrf
      @method('PUT')
      <div class="card-header">
          roles
    </div>

    {{ dd($roles) }}

    <div class="card-body">
      @foreach ($roles as $role) 
        <div class="form-check">
          <input 
            class="form-check-input @error('roles') is-invalid @enderror " 
            type="checkbox"
            value="{{ $role->id }}"
            name="roles[] [name]"
            >
                    {{-- @checked(in_array($item, $user->interests->pluck('name')->toArray())); --}}
          <label class="form-check-label">
            {{ $item }}
          </label>

          @if($role->last)
              @error('roles') 
                  <div class="invalid-feedback">
                      {{ $role->name }}
                  </div>
              @enderror
          @endif
          
        </div>
      @endforeach
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>

  </form>
</div>
