@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2>Create a New Record</h2>
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
        <form action="{{ route('admin.projects.store') }}" method="POST">
            @csrf
            {{-- input name --}}
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}">
            </div>
            {{-- input description --}}
            <div class="mb-3">
                <label for="descriptionArea" class="form-label">Project Description</label>
                <textarea class="form-control" id="descriptionArea" rows="3" name="description">{{ old('description') }}</textarea>
            </div>
            {{-- input tech stack --}}
            <div class="mb-3">
                <label for="inputStack" class="form-label">Tech Stack</label>
                <input type="text" class="form-control" id="inputStack" name="tech_stack"
                    value="{{ old('tech_stack') }}">
            </div>
            {{-- select type --}}
            <div class="mb-3">
                <label for="inputType" class="form-label">Type</label>
                <select class="form-select" name="type_id">
                    <option selected>Select type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- checkbox technologies --}}
            <div class="mb-3">
                <div>
                    <label for="technologies" class="form-label">Technologies</label>
                </div>
                @foreach ($technologies as $tech)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="{{ $tech->id }}" name="technologies[]"
                            id="tech-{{ $tech->id }}"
                            {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tech-{{ $tech->id }}">{{ $tech->name }}</label>
                    </div>
                @endforeach
            </div>
            {{-- input repo link --}}
            <div class="mb-3">
                <label for="inputRepo" class="form-label">Repo Link</label>
                <input type="text" class="form-control" id="inputRepo" name="repo_link" value="{{ old('repo_link') }}">
            </div>
            {{-- input live link --}}
            <div class="mb-3">
                <label for="inputLive" class="form-label">Live Link</label>
                <input type="text" class="form-control" id="inputLive" name="live_link" value="{{ old('live_link') }}">
            </div>
            {{-- input slug --}}
            <div class="mb-3">
                <label for="inputSlug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="inputSlug" name="slug" value="{{ old('slug') }}">
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
