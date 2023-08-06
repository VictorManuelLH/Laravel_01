@extends('layout')

@section('title', 'Portfolio')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="display-4 mb-0" >Porfolio</h1>

            @auth
                <a class="btn btn-primary" href="{{ route('projects.create') }}">Create project</a>
            @endauth
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
                                <a class="btn btn-primary btn-sm" href="{{ route('projects.show', $project) }}">Go project</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    {{-- <li class="list-group-item border-0 mb-3 shadow-sm">Not projects shows</li> --}}
        @endforelse
        {{ $projects -> links() }}
        </div>
    </div>
@endsection
