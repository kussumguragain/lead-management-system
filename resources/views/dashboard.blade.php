@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="bg-white rounded shadow p-6">
        <p class="text-lg mb-4">Welcome Admin 👋</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center">
            <div class="bg-gray-100 p-4 rounded">
                <p>Total Leads: <span class="font-bold">{{ $totalLeads ?? 0 }}</span></p>
            </div>
            <div class="bg-gray-100 p-4 rounded">
                <p>Converted: <span class="font-bold">{{ $convertedLeads ?? 0 }}</span></p>
            </div>
            <div class="bg-gray-100 p-4 rounded">
                <p>New: <span class="font-bold">{{ $newLeads ?? 0 }}</span></p>
            </div>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold mb-2">Lead Conversion Rate 📈</h2>
            {{-- You can add a chart here later --}}
        </div>
    </div>
@endsection
