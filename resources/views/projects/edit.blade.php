@extends('layout')

@section('title', 'Create project')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            @include('partials.validation-errors')

            <form class="bg-white py-4 px-4 shadow rounded" enctype="multipart/form-data" action="{{ route('projects.update', $project) }}" method="POST">
                @method('PATCH')
                <h1 class="display-4">Edit project</h1>
                <hr>
                @include('projects._form', ['btnText' => 'Update'])

            </form>
        </div>
    </div>
</div>
@endsection
