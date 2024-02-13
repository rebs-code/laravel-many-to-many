@extends('layouts.admin')

@section('content')
    <div class="container py-4">

        {{-- add toast if record created successfully --}}
        @if (session('message'))
            <div class="toast-container position-fixed bottom-0 end-0 p-3">
                {{-- adding class show --}}
                <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <strong class="me-auto">Create</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{-- the message is taken from the controller --}}
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h2>Technologies List</h2>
            <a href="{{ route('admin.technologies.create') }}" role="button" class="btn btn-primary my-2">Create a New
                Technology</a>
        </div>
        {{-- table showing record --}}
        <table class="table-striped-columns table table-dark">
            <thead>
                <tr>
                    <th scope="col">Technology Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" class="col-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technologies as $technology)
                    <tr>
                        <td>{{ $technology->name }}</td>
                        <td>{{ $technology->slug }}</td>
                        <td>
                            <a href="{{ route('admin.technologies.show', $technology) }}" role="button"
                                class="btn btn-primary btn-sm me-1">Show</a>
                            <a href="{{ route('admin.technologies.edit', $technology) }}" role="button"
                                class="btn btn-info btn-sm me-1 text-white">Edit</a>
                            <form
                                action="
                                {{ route('admin.technologies.destroy', $technology->slug) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger btn-sm text-white"
                                    style="display: inline;">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
