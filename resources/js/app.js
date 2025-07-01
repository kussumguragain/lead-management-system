import Chart from 'chart.js/auto';

document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('leadChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['New', 'Contacted', 'Converted'],
                datasets: [{
                    label: 'Leads',
                    data: [60, 25, 35],
                    backgroundColor: ['#3498db', '#f39c12', '#2ecc71']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Lead Conversion Overview'
                    }
                }
            }
        });
    }
});
