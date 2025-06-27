@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Lead</h2>

    <form action="{{ route('leads.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone:</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Source:</label>
            <input type="text" name="source" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Lead</button>
    </form>
</div>
@endsection
