@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Lead</h1>

        <form method="POST" action="{{ route('leads.update', $lead->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label>Name:</label>
                <input type="text" name="name" value="{{ $lead->name }}" required>
            </div>

            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ $lead->email }}" required>
            </div>

            <div>
                <label>Phone:</label>
                <input type="text" name="phone" value="{{ $lead->phone }}" required>
            </div>

            <div>
                <label>Source:</label>
                <input type="text" name="source" value="{{ $lead->source }}">
            </div>

            <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
            <option value="New" {{ $lead->status == 'New' ? 'selected' : '' }}>New</option>
            <option value="Contacted" {{ $lead->status == 'Contacted' ? 'selected' : '' }}>Contacted</option>
            <option value="Followed Up" {{ $lead->status == 'Followed Up' ? 'selected' : '' }}>Followed Up</option>
            <option value="Converted" {{ $lead->status == 'Converted' ? 'selected' : '' }}>Converted</option>
            <option value="Lost" {{ $lead->status == 'Lost' ? 'selected' : '' }}>Lost</option>
            </select>
            </div>


            <button type="submit">Update</button>
        </form>
    </div>
@endsection
