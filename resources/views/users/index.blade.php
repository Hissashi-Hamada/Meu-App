@extends('layouts.default')
@section('page-title', 'Usuários')
@section('page-actions')
    <a href={{ route('users.create') }}  class="btn btn-primary">Adicionar Usuaraio</a>
@endsection
@section('content')
      @session('status')
          <div class="alert alert-success">
              {{$value}}
          </div>
      @endsession

    <form
      action="{{ route('users.index') }}"
      method="GET"
      class="mb-3"
      style="width: 315px"
    >
        <div class="input-group ">
        <input 
          type="text"
          name="keyword"
          class="form-control"
          placeholder="Pesquise por nome ou email"
          value="{{ request('keyword') }}"
        >
        <button class="btn btn-primary">Pesquisa</button>
        </div>
    </form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Ação</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user) 
          <tr>
              <th scope="row">{{ $user->id }}</th>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @can('edit', \App\Models\User::class)
                  <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Editar</a>
                @endcan
                @can('destroy', \App\Models\User::class)
                  <form
                    action="{{ route('users.destroy', $user->id) }}"
                    method="POST"
                    
                  >
                    @csrf
                    @method('DELETE') 
                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                @endcan
                  </form>
              </td>
          </tr>
      @endforeach
    </tbody>
  </table>
  
  {{ $users->links() }}
@endsection