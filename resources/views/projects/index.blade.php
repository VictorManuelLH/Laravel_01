@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @isset($category)
            <div>
                <h1 class="display-4 mb-0" >{{ $category -> name }}</h1>
                <a href="{{ route('projects.index') }}">Regresar al portafolio</a>
            </div>
            @else
            <h1 class="display-4 mb-0" >Porfolio</h1>
            @endisset

            <a class="btn btn-primary" href="{{ route('projects.create') }}">Create project</a>

        </div>
        <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <div class="row row-cols-4">
        @forelse ($projects as $project)
                    <div class="col">
                        <div class="card">
                            @if ($project -> image)
                                <img class="card-img-top" style="height: 170px; object-fit: cover" src="/storage/{{ $project -> image }}" alt="{{ $project -> title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-primary">{{ $project -> title }} </h5>
                                <p class="card-text text-truncate"> {{ $project -> description }}</p>
                                <p class="text-black-50 card-text"> {{ $project -> created_at -> format('d/m/Y') }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-primary btn-sm" href="{{ route('projects.show', $project) }}">Go project</a>
                                    @if ($project -> category_id)
                                    <a href="{{ route('categories.show', $project -> category) }}" class="bg-secondary text-white">{{ $project -> category -> name }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    {{-- <li class="list-group-item border-0 mb-3 shadow-sm">Not projects shows</li> --}}
        @endforelse
            <div class="mt-4">
                {{ $projects -> links() }}
            </div>
        </div>
    </div>
@endsection
