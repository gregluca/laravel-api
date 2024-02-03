@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h2>Modifica Progetto</h2>

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                <div class="text-danger invalid-feedback">{{ $message }}</div>
                @enderror

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description', $project->description) }}</textarea>
            </div>   


            <button class="btn btn-warning" type="submit">Salva</button>
            <a class="btn btn btn-secondary" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">Cancella</a>

        </form>
    </div>
@endsection