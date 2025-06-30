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
        <label for="source" class="form-label">Source:</label>
        <select name="source" class="form-select" required>
        <option value="">Select source</option>
        <option value="Facebook">Facebook</option>
        <option value="Google Ads">Google Ads</option>
        <option value="Instagram">Instagram</option>
        <option value="LinkedIn">LinkedIn</option>
        <option value="Website">Website</option>
        <option value="Referral">Referral</option>
        <option value="Email Campaign">Email Campaign</option>
        <option value="Phone Call">Phone Call</option>
        <option value="Event / Trade Show">Event / Trade Show</option>
        <option value="Walk-in">Walk-in</option>
        <option value="Other">Other</option>
    </select>
</div>


        <button type="submit" class="btn btn-primary">Add Lead</button>
    </form>
</div>
@endsection
