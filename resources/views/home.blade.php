@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h1 class="display-4 text-primary">Web Developer</h1>
                <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti incidunt fuga reiciendis eveniet perspiciatis illum dolores qui nulla, quibusdam consequuntur, voluptatibus quae, ut voluptatum aperiam unde tenetur enim quas soluta?</p>
                <a class="btn btn-lg btn-block btn-primary" href="{{ route('contact') }}">Contact me</a>
                <a class="btn btn-lg btn-block btn-outline-primary" href="{{ route('projects.index') }}">Portafolio</a>
            </div>
            <div class="col-12 col-lg-6">
                <img class="img-fluid mb-4" src="/img/home.svg" alt="Developer web">
            </div>
        </div>
    </div>
@endsection
