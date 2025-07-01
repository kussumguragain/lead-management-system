@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">📊 Reports</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white shadow rounded-lg p-4">
            <h2 class="text-lg font-semibold">Total Leads</h2>
            <p class="text-2xl font-bold text-blue-600">{{ $totalLeads }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <h2 class="text-lg font-semibold">Converted</h2>
            <p class="text-2xl font-bold text-green-600">{{ $convertedLeads }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-4">
            <h2 class="text-lg font-semibold">New</h2>
            <p class="text-2xl font-bold text-yellow-500">{{ $newLeads }}</p>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">Lead Conversion Rate</h2>

        <div class="my-4 text-center text-lg">
            @php
                $conversionRate = $totalLeads > 0 ? round(($convertedLeads / $totalLeads) * 100, 2) : 0;
            @endphp
            <strong>Conversion Rate:</strong> {{ $conversionRate }}%
        </div>

        <canvas id="conversionChart" width="300" height="300" style="display: block; margin: 0 auto;"></canvas>
    </div>

    <div class="bg-white shadow rounded-lg p-6 mt-8">
        <h2 class="text-xl font-semibold mb-4">Leads by Source</h2>
        <ul class="list-disc list-inside">
            @foreach($leadsBySource as $source)
                <li><strong>{{ $source->source ?? 'Unknown' }}:</strong> {{ $source->total }} leads</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('conversionChart').getContext('2d');
    const conversionChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Converted', 'New', 'Others'],
            datasets: [{
                label: 'Leads',
                data: [{{ $convertedLeads }}, {{ $newLeads }}, {{ $totalLeads - ($convertedLeads + $newLeads) }}],
                backgroundColor: [
                    'rgba(34, 197, 94, 0.7)',
                    'rgba(234, 179, 8, 0.7)',
                    'rgba(147, 197, 253, 0.7)'
                ],
                borderColor: [
                    'rgba(34, 197, 94, 1)',
                    'rgba(234, 179, 8, 1)',
                    'rgba(147, 197, 253, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>
@endsection
