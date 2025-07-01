@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="bg-white rounded shadow p-6">
        <p class="text-lg mb-4">Welcome Admin 👋</p>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center mb-6">
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
            <canvas id="conversionChart" width="300" height="300" style="display: block; margin: 0 auto;"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('conversionChart').getContext('2d');
    const totalLeads = {{ $totalLeads ?? 0 }};
    const convertedLeads = {{ $convertedLeads ?? 0 }};
    const newLeads = {{ $newLeads ?? 0 }};
    const others = totalLeads - (convertedLeads + newLeads);

    const conversionChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Converted', 'New', 'Others'],
            datasets: [{
                data: [convertedLeads, newLeads, others > 0 ? others : 0],
                backgroundColor: [
                    'rgba(34, 197, 94, 0.7)',   // green
                    'rgba(234, 179, 8, 0.7)',   // yellow
                    'rgba(147, 197, 253, 0.7)'  // blue
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
                    position: 'bottom',
                }
            }
        }
    });
</script>
@endsection
