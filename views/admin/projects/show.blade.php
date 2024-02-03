@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h1>{{ $project->title }}</h1>

        <hr>

        <ul>
            <li class="my-3"> 
                Type:  {{ $project->type ? $project->type->name : 'No type' }}
            </li>
            <li>
                <strong>Technology: </strong>
                @forelse ($project->technologies as $technology)
                    <span class="badge" style="background-color: {{ $technology->hex_color }}">{{ $technology->name }}</span>
                @empty
                    <span>Technology used not available</span>
                @endforelse
            </li>
            <li class="my-3">
                <strong>Slug: </strong>
                {{ $project->slug }}
            </li>
            <li class="my-3">
                <strong>Description </strong>
                {{ $project->description }}
            </li>
        </ul>

        <div class="text-start my-5">
                <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Go Back</a>
            </div>
        </div>
@endsection