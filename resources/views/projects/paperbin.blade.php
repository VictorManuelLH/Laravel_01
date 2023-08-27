@extends('layout')

@section('title', 'Paper bin')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @isset($category)
            <div>
                <h1 class="display-4 mb-0" >{{ $category -> name }}</h1>
                <a href="{{ route('projects.index') }}">Regresar al portafolio</a>
            </div>
            @else
            <h1 class="display-4 mb-0" >Paper bin</h1>
            @endisset
        </div>
        <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <div class="row row-cols-4">
        @forelse ($deletedProjects as $deletedProject)
                    <div class="col">
                        <div class="card">
                            @if ($deletedProject -> image)
                                <img class="card-img-top" style="height: 170px; object-fit: cover" src="/storage/{{ $deletedProject -> image }}" alt="{{ $deletedProject -> title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-primary">{{ $deletedProject -> title }} </h5>
                                <p class="card-text text-truncate"> {{ $deletedProject -> description }}</p>
                                <p class="card-text text-truncate">Category {{ $deletedProject -> category_id }}</p>
                                <p class="text-black-50 card-text"> {{ $deletedProject -> created_at -> format('d/m/Y') }}</p>
                                <div class="">
                                    @can('restore', $deletedProject)
                                    <form method="POST" class="d-inline" action="{{ route('projects.restore', $deletedProject) }}">
                                        @csrf @method('PATCH')
                                        <button class="btn btn-sm btn-info" >Restore</button>
                                    </form>
                                    @endcan
                                    @can('forceDelete', $deletedProject)
                                    <form method="POST" onsubmit="return confirm('This action cannot be undone, are you sure to delete the project permanently?')" class="d-inline" action="{{ route('projects.forceDelete', $deletedProject) }}">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger" >Delete permanently</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
        @endforelse
        </div>
    </div>
@endsection
