@extends('layouts.app')

@section('content')
<!-- Main Content -->
<div class="content flex-1 md:ml-64 transition-all duration-300 ease-in-out">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Dashboard</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Welcome back, here's what's happening with your application today.</p>
            </div>
            <div class="mt-4 md:mt-0 flex space-x-2">
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center transition duration-200">
                    <i class="fas fa-download mr-2"></i>
                    Export
                </button>
                <button class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg flex items-center transition duration-200">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Users</h3>
                    <div class="bg-indigo-100 dark:bg-indigo-900 p-3 rounded-full">
                        <i class="fas fa-users text-indigo-600 dark:text-indigo-300 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800 dark:text-white">1,234</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                    <p class="text-green-500 text-sm">12% from last month</p>
                </div>
            </div>
            
            <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Revenue</h3>
                    <div class="bg-green-100 dark:bg-green-900 p-3 rounded-full">
                        <i class="fas fa-dollar-sign text-green-600 dark:text-green-300 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800 dark:text-white">$45,678</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                    <p class="text-green-500 text-sm">8% from last month</p>
                </div>
            </div>
            
            <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Active Sessions</h3>
                    <div class="bg-blue-100 dark:bg-blue-900 p-3 rounded-full">
                        <i class="fas fa-signal text-blue-600 dark:text-blue-300 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800 dark:text-white">567</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-up text-green-500 text-xs mr-1"></i>
                    <p class="text-green-500 text-sm">23% from last month</p>
                </div>
            </div>
            
            <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Conversion Rate</h3>
                    <div class="bg-purple-100 dark:bg-purple-900 p-3 rounded-full">
                        <i class="fas fa-chart-line text-purple-600 dark:text-purple-300 text-xl"></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-800 dark:text-white">3.48%</p>
                <div class="flex items-center mt-2">
                    <i class="fas fa-arrow-down text-red-500 text-xs mr-1"></i>
                    <p class="text-red-500 text-sm">5% from last month</p>
                </div>
            </div>
        </div>
        
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Revenue Overview</h3>
                    <div class="flex space-x-1">
                        <button class="px-3 py-1 text-xs bg-indigo-100 dark:bg-indigo-900 text-indigo-600 dark:text-indigo-300 rounded">Week</button>
                        <button class="px-3 py-1 text-xs text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Month</button>
                        <button class="px-3 py-1 text-xs text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 rounded">Year</button>
                    </div>
                </div>
                <div class="h-64 flex items-center justify-center bg-gray-50 dark:bg-gray-900 rounded">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
            
            <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Traffic Sources</h3>
                    <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div>
                <div class="h-64 flex items-center justify-center bg-gray-50 dark:bg-gray-900 rounded">
                    <canvas id="trafficChart"></canvas>
                </div>
            </div>
        </div>
        
        <!-- Recent Activity Table -->
        <div class="card bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Recent Activity</h3>
                <a href="#" class="text-indigo-600 dark:text-indigo-400 text-sm hover:underline">View all</a>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Action</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe&background=6366f1&color=fff" alt="John Doe">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">John Doe</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">john@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">Created new report</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2023-06-15</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                    Completed
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Jane+Smith&background=10b981&color=fff" alt="Jane Smith">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Jane Smith</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">jane@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">Updated profile</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2023-06-14</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                                    In Progress
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Bob+Johnson&background=f59e0b&color=fff" alt="Bob Johnson">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900 dark:text-white">Bob Johnson</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">bob@example.com</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 dark:text-gray-300">Deleted user</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2023-06-13</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                    Failed
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Chart.js implementation
    document.addEventListener('DOMContentLoaded', function() {
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Revenue',
                    data: [12000, 19000, 15000, 25000, 22000, 30000, 28000],
                    borderColor: 'rgb(99, 102, 241)',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
        
        // Traffic Sources Chart
        const trafficCtx = document.getElementById('trafficChart').getContext('2d');
        new Chart(trafficCtx, {
            type: 'doughnut',
            data: {
                labels: ['Direct', 'Social', 'Referral', 'Organic'],
                datasets: [{
                    data: [35, 25, 20, 20],
                    backgroundColor: [
                        'rgba(99, 102, 241, 0.8)',
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            font: {
                                size: 11
                            }
                        }
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>
@endsection