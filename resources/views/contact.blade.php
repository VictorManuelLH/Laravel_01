@extends('layout')

@section('title', 'Contact')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">
            <form class="bg-white shadow rounded py-3 px-4" action="{{ route('contact') }}" method="POST">
                @csrf
                <h1 class="display-4">{{ __('Contact') }}</h1>
                <hr>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control bg-light shadow-smborder-0 @error('name') is-invalid @else border-0 @enderror" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" >
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control bg-light shadow-smborder-0 @error('email') is-invalid @else border-0 @enderror" type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input class="form-control bg-light shadow-smborder-0 @error('subject') is-invalid @else border-0 @enderror" type="text" name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}" >
                    @error('subject')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control bg-light shadow-smborder-0 @error('content') is-invalid @else border-0 @enderror" name="content" id="content" cols="30" rows="7" placeholder="Menssage...">{{ old('content') }}</textarea><br>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg btn-block">{{ __('Send') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
