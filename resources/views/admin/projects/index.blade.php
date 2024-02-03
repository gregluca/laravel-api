@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2>Lista dei post</h2>
    <div class="text-end my-5">
      <a class="btn btn-secondary" href="{{ route('admin.projects.create') }}">Aggiungi un progetto</a>
    </div>
    <div class="text-end">

      @if (session('message'))
        <div class="alert alert-success mt-5">
            {{ session('message') }}
        </div>
    @endif
      {{-- <a class="btn btn-success" href="{{ route('admin.posts.create') }}">Crea un nuovo post</a> --}}
    </div>

    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Tipologia</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row d-flex">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->type_id }}</td>
                    <td>
                        <a class="btn btn-success m-1" href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">
                          <i class="fa-solid fa-info"></i>
                          Dettagli</a>
                        <a class="btn btn-warning" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                          <i class="fa-solid fa-pencil"></i>
                          Modifica
                        </a>
                      <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" class="" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">
                              <i class="fa-solid fa-trash"></i>
                              Cancella
                          </button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection