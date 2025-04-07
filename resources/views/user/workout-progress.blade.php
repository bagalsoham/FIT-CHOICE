<section class="bg-black p-4">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold text-white mb-6">Workout Dashboard</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Workout Duration Trend Card -->
            <div class="bg-gray-800 rounded-lg shadow p-4">
                <h3 class="text-lg font-medium text-white mb-4">Workout Duration Trend</h3>
                <div class="h-64 relative">
                    <canvas id="durationChart"></canvas>
                </div>
            </div>

            <!-- Workout Types Distribution Card -->
            <div class="bg-gray-800 rounded-lg shadow p-4">
                <h3 class="text-lg font-medium text-white mb-4">Workout Types Distribution</h3>
                <div class="h-64 relative">
                    <canvas id="typeDistributionChart"></canvas>
                </div>
                <div class="flex justify-center mt-2">
                    <div class="flex items-center mx-2">
                        <div class="w-4 h-4 bg-blue-500 rounded-sm mr-1"></div>
                        <span class="text-sm text-gray-300">Cardio</span>
                    </div>
                    <div class="flex items-center mx-2">
                        <div class="w-4 h-4 bg-cyan-400 rounded-sm mr-1"></div>
                        <span class="text-sm text-gray-300">Strength</span>
                    </div>
                    <div class="flex items-center mx-2">
                        <div class="w-4 h-4 bg-teal-500 rounded-sm mr-1"></div>
                        <span class="text-sm text-gray-300">HIIT</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Workouts Section -->
        <section class="bg-gray-800 rounded-lg shadow p-4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-white">Recent Workouts</h2>
                <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition">
                    Add Workout
                </button>
            </div>

            <!-- Workout Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left text-gray-300">
                            <th class="pb-3 font-medium">Date</th>
                            <th class="pb-3 font-medium">Type</th>
                            <th class="pb-3 font-medium">Duration</th>
                            <th class="pb-3 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <tr class="hover:bg-gray-700">
                            <td class="py-4 text-white">10/1/2023</td>
                            <td class="py-4 text-white">Cardio</td>
                            <td class="py-4 text-white">45 min</td>
                            <td class="py-4">
                                <button class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-sm transition">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-700">
                            <td class="py-4 text-white">10/3/2023</td>
                            <td class="py-4 text-white">Strength</td>
                            <td class="py-4 text-white">60 min</td>
                            <td class="py-4">
                                <button class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-sm transition">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-700">
                            <td class="py-4 text-white">10/5/2023</td>
                            <td class="py-4 text-white">HIIT</td>
                            <td class="py-4 text-white">30 min</td>
                            <td class="py-4">
                                <button class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-sm transition">
                                    View Details
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-700">
                            <td class="py-4 text-white">10/8/2023</td>
                            <td class="py-4 text-white">Cardio</td>
                            <td class="py-4 text-white">45 min</td>
                            <td class="py-4">
                                <button class="bg-gray-600 hover:bg-gray-500 text-white px-3 py-1 rounded text-sm transition">
                                    View Details
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</section>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Static data for Duration Line Chart
    const durationCtx = document.getElementById('durationChart').getContext('2d');
    new Chart(durationCtx, {
        type: 'line',
        data: {
            labels: ['Oct 1', 'Oct 3', 'Oct 5', 'Oct 8'],
            datasets: [{
                label: 'Duration (min)',
                data: [45, 60, 30, 45],
                borderColor: 'rgba(59, 130, 246, 0.8)',
                backgroundColor: 'rgba(59, 130, 246, 0.2)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Minutes'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: '#fff'
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.05)'
                    },
                    ticks: {
                        color: '#fff'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Static data for Type Distribution Pie Chart
    const typeDistributionCtx = document.getElementById('typeDistributionChart').getContext('2d');
    new Chart(typeDistributionCtx, {
        type: 'pie',
        data: {
            labels: ['Cardio', 'Strength', 'HIIT'],
            datasets: [{
                data: [50, 25, 25],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(6, 182, 212, 0.8)',
                    'rgba(20, 184, 166, 0.8)'
                ],
                borderColor: [
                    'rgba(59, 130, 246, 1)',
                    'rgba(6, 182, 212, 1)',
                    'rgba(20, 184, 166, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `${context.label}: ${context.raw}%`;
                        }
                    }
                }
            }
        }
    });
</script>
