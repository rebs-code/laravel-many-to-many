@extends('layouts.admin')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12">
                <h1> Tech name: {{ $technology->name }}</h1>
                <h5>Technology slug: {{ $technology->slug }}</h5>
                <a href="{{ route('admin.technologies.index') }}" role="button" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
