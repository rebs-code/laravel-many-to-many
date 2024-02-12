@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2>Edit {{ $project->name }}</h2>
        <p>or <a href="{{ route('admin.projects.index') }}">back to Projects</a></p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{-- form to create a new project --}}
        <form action="{{ route('admin.projects.update', $project) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- input name --}}
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name"
                    value="{{ old('name', $project->name) }}">
            </div>
            {{-- input description --}}
            <div class="mb-3">
                <label for="descriptionArea" class="form-label">Project Description</label>
                <textarea class="form-control" id="descriptionArea" rows="3" name="description">{{ old('description', $project->description) }}</textarea>
            </div>
            {{-- input tech stack --}}
            <div class="mb-3">
                <label for="inputStack" class="form-label">Tech Stack</label>
                <input type="text" class="form-control" id="inputStack" name="tech_stack"
                    value="{{ old('tech_stack', $project->tech_stack) }}">
            </div>
            {{-- select type --}}
            <div class="mb-3">
                <label for="inputType" class="form-label">Type</label>
                <select class="form-select" name="type_id">
                    <option selected>Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- input repo link --}}
            <div class="mb-3">
                <label for="inputRepo" class="form-label">Repo Link</label>
                <input type="text" class="form-control" id="inputRepo" name="repo_link"
                    value="{{ old('repo_link', $project->repo_link) }}">
            </div>
            {{-- input live link --}}
            <div class="mb-3">
                <label for="inputLive" class="form-label">Live Link</label>
                <input type="text" class="form-control" id="inputLive" name="live_link"
                    value="{{ old('live_link', $project->live_link) }}">
            </div>
            {{-- input slug --}}
            <div class="mb-3">
                <label for="inputSlug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="inputSlug" name="slug"
                    value="{{ old('slug', $project->slug) }}">
            </div>
            {{-- input image --}}
            <div class="mb-3">
                <label for="inputImage" class="form-label">Image</label>
                <input class="form-control" type="text" id="inputImage" name="image" value="{{ old('image') }}">
            </div>
            {{-- button to submit --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection