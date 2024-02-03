@extends('layouts.admin')

@section('content')
    <div class="container my-5">
        <h1>{{ $project->title }}</h1>

        <hr>

        <ul>
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