@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1>{{ $project->name }}</h1>
                <p>{{ $project->description }}</p>
                <p>{{ $project->tech_stack }}</p>
                @if ($project->type)
                    <p>{{ $project->type->name }}</p>
                @endif
                <div>
                    @foreach ($project->technologies as $tech)
                        <span class="badge bg-secondary">{{ $tech->name }}</span>
                    @endforeach
                </div>
                <p>{{ $project->repo_link }}</p>
                <p>{{ $project->slug }}</p>
                <a href="{{ route('admin.projects.index') }}" role="button" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
