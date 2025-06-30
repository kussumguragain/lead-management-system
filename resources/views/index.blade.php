@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">All Leads</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('leads.create') }}" class="btn btn-success mb-3">
        Add Lead
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th style="min-width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leads as $lead)
                    <tr>
                        <td>{{ $lead->id }}</td>
                        <td>{{ $lead->name }}</td>
                        <td>{{ $lead->email }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->source }}</td>
                        <td>
                            @if($lead->status === 'new')
                                <span class="badge bg-primary text-uppercase">{{ $lead->status }}</span>
                            @elseif($lead->status === 'converted')
                                <span class="badge bg-success text-uppercase">{{ $lead->status }}</span>
                            @else
                                <span class="badge bg-secondary text-uppercase">{{ $lead->status }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-sm btn-warning me-2">
                                Edit
                            </a>
                            <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this lead?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No leads found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
