<!-- resources/views/admin/categories/create.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Create Category</h1>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Create Category</button>
    </form>
</div>
@endsection
