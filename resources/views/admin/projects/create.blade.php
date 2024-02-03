@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Aggiungi un progetto</h2>

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            
            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 has-validation">
                <label for="type">Seleziona una tipologia</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type">
                    <option @selected(!old('type_id')) value="">Nessuno</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>   
                @error('type_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
            </div>     

            <div class="mb -5">
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input @checked(in_array($technology->id, old('technologies', [])))  type="checkbox" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]"> 
                        <label for="technology-{{ $technology->id }}">
                            {{ $technology->name }}
                        </label>
                    </div>
                @endforeach
                @error('technologies')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            
            <button class="btn btn-success" type="submit">Save</button>

        </form>
    </div>
@endsection