@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Lead</h1>

        <form method="POST" action="{{ route('leads.store') }}">
            @csrf

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" required>
            </div>

            <div>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" required>
            </div>

            <div>
                <label for="source">Source:</label>
                <input type="text" name="source">
            </div>

            <button type="submit">Add Lead</button>
        </form>
    </div>
@endsection
