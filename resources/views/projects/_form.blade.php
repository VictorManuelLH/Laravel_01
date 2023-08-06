@csrf
<div class="custom-file">
    <input type="file" class="form-control" name="image" id="customFile">
    <label for="customFile" class="form-label">Choose file</label>
</div>
<div class="row">
    <div class="col-12 col-sm-10 col-lg-8 mx-auto">
        @if ($project -> image)
            <img class="card-img-top" style="height: 250px; object-fit: cover" src="/storage/{{ $project -> image }}" alt="{{ $project -> title }}">
        @endif
    </div>
</div>
<div class="form-group">
    <label for="title">Title: </label>
    <input class="form-control bg-light shadow-sm  @error('title') is-invalid @else border-0 @enderror" type="text" id="title" name="title"placeholder="Title:" value="{{ old('title', $project -> title) }}" >
</div>

<div class="form-group">
    <label for="url">Url: </label>
    <input class="form-control bg-light shadow-sm  @error('url') is-invalid @else border-0 @enderror" type="text" id="url" name="url" placeholder="Url:" value="{{ old('url', $project -> url) }}" >
</div>

<div class="form-group">
    <label for="description">Description: </label>
    <textarea class="form-control bg-light shadow-sm  @error('description') is-invalid @else border-0 @enderror" name="description" id="description" cols="30" rows="8">{{ old('description', $project -> description) }}</textarea>
</div>

<br>

<button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>
<a class="btn btn-link btn-block" href="{{ route('projects.index') }}">Cancel</a>
