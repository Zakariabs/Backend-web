<!-- resources/views/admin/faqs/index.blade.php -->

@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>FAQs</h1>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary mb-3">Add New FAQ</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Question</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
                <tr>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->category->name }}</td>
                    <td>
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this FAQ?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $faqs->links() }}
</div>
@endsection
