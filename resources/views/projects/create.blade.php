@extends('layout')

@section('title', 'Create project')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-6 mx-auto">

                @include('partials.validation-errors')

                <form class="bg-white py-4 px-4 shadow rounded" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    <h1 class="display-4">New project</h1>

                    @include('projects._form', ['btnText' => 'Save'])

                </form>
            </div>
        </div>
    </div>
@endsection
