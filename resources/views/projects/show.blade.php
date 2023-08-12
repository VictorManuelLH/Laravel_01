@extends('layout')

@section('title', 'Portfolio | ' . $project -> title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-8 mx-auto">
                @if ($project -> image)
                    <img class="card-img-top" src="/storage/{{ $project -> image }}" alt="{{ $project -> title }}">
                @endif
            </div>
        </div>
        <div class="bg-white p-5 shadow rounded">
            <h1 class="mb-0">{{ $project -> title }}</h1>
            @if ($project -> category_id)
            <a href="{{ route('categories.show', $project -> category) }}" class="bg-secondary text-white mb-1">{{ $project -> category -> name }}</a>
            @endif
            <p class="text-secondary">{{ $project -> description }}</p>
            <p class="text-black-50">{{ $project -> created_at -> diffForHumans() }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('projects.index') }}">Back</a>
                @auth
                <div class="btn-group btn-group-sm">
                    <a class="btn btn-primary" href="{{ route('projects.edit', $project) }}">Edit project</a>
                    <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-project').submit()">Delete</a>
                    <form id="delete-project" action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
