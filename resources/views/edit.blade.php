@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Lead</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leads.update', $lead->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" value="{{ $lead->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" value="{{ $lead->email }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" value="{{ $lead->phone }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="source" class="form-label">Source:</label>
            <input type="text" name="source" value="{{ $lead->source }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" class="form-select">
                <option value="new" {{ $lead->status === 'new' ? 'selected' : '' }}>New</option>
                <option value="contacted" {{ $lead->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                <option value="followed-up" {{ $lead->status === 'followed-up' ? 'selected' : '' }}>Followed Up</option>
                <option value="converted" {{ $lead->status === 'converted' ? 'selected' : '' }}>Converted</option>
                <option value="lost" {{ $lead->status === 'lost' ? 'selected' : '' }}>Lost</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Lead</button>
    </form>
</div>
@endsection
