@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <h2>Edit tech: {{ $technology->name }}</h2>
        <p>or <a href="{{ route('admin.technologies.index') }}">back to Technologies</a></p>

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
        <form action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST">
            @csrf
            @method('PUT')
            {{-- input name --}}
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control" id="inputName" name="name"
                    value="{{ old('name', $technology->name) }}">
            </div>
            {{-- button to submit --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
