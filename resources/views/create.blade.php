@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h1 class="mb-4 text-center">Add New Lead</h1>

    <form method="POST" action="{{ route('leads.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Name<span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" required 
                   class="form-control @error('name') is-invalid @enderror" 
                   value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold">Email<span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" required
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label fw-bold">Phone<span class="text-danger">*</span></label>
            <input type="text" name="phone" id="phone" required
                   class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="source" class="form-label fw-bold">Source</label>
            <input type="text" name="source" id="source" 
                   class="form-control @error('source') is-invalid @enderror"
                   value="{{ old('source') }}">
            @error('source')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success w-100">Add Lead</button>
    </form>
</div>
@endsection
