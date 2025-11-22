<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - FortezzaQuartz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
        }
        
        .sidebar-collapsed {
            width: 80px;
        }
        
        .sidebar-collapsed .sidebar-text {
            display: none;
        }
        
        .sidebar-collapsed .sidebar-logo-text {
            display: none;
        }
        
        .sidebar-collapsed .nav-item {
            justify-content: center;
        }
        
        .sidebar-collapsed .nav-item span {
            display: none;
        }
        
        .sidebar-collapsed .sidebar-logo-img {
            display: none;
        }
        
        .dark-mode {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        
        .dark-mode .sidebar {
            background-color: #2d3748;
        }
        
        .dark-mode .content-area {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        
        .dark-mode .card {
            background-color: #2d3748;
            color: #e2e8f0;
        }

        .dark-mode .table-row:hover {
            background-color: #374151;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 50;
                height: 100vh;
            }
            
            .sidebar-closed {
                transform: translateX(-100%);
            }

            .content-area {
                margin-left: 0 !important;
            }
        }

        .content-area {
            transition: margin-left 0.3s ease-in-out;
        }
    </style>
</head>
<body class="font-sans antialiased h-full bg-gray-50">
    <!-- Mobile Menu Button -->
    <button id="mobileMenuToggle" class="md:hidden fixed top-4 left-4 z-50 p-3 rounded-lg bg-indigo-600 text-white shadow-lg hover:bg-indigo-700 transition">
        <i class="fas fa-bars text-xl"></i>
    </button>

    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar sidebar-transition fixed top-0 left-0 h-full bg-indigo-800 text-white w-64 flex flex-col z-40 shadow-2xl sidebar-closed md:sidebar-open">
        <!-- Logo -->
        <div class="sidebar-logo p-6 border-b border-indigo-700 flex items-center justify-between">
            <div class="flex items-center">
                <!-- <i class="fas fa-graduation-cap text-2xl"></i> -->
                  <!-- Replace text with image -->
        <img src="/fortezza-logo-white.webp" alt="CampusPortal Logo" id="sidebarLogo" class="sidebar-logo-img h-8 ml-3">
            </div>
            <div class="flex items-center">
                <!-- Mobile Close Button -->
                <button id="mobileCloseButton" class="md:hidden text-white hover:text-indigo-200 focus:outline-none transition ml-2">
                    <i class="fas fa-times text-xl"></i>
                </button>
                <!-- Desktop Sidebar Toggle -->
                <button id="sidebarToggle" class="hidden md:block text-white hover:text-indigo-200 focus:outline-none transition">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        
        <!-- Navigation -->
        <ul class="flex-1 py-4 overflow-y-auto">
    <li>
        <a href="/dashboard"
           class="nav-item flex items-center px-6 py-3 transition-colors duration-200
                  {{ request()->is('dashboard') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
            <i class="fas fa-tachometer-alt w-6"></i>
            <span class="ml-3 sidebar-text">Dashboard</span>
        </a>
    </li>

    <li>
        <a href="/products"
           class="nav-item flex items-center px-6 py-3 transition-colors duration-200
                  {{ request()->is('products*') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
            <i class="fas fa-shopping-cart w-6"></i>
            <span class="ml-3 sidebar-text">Shop Products</span>
        </a>
    </li>

    <li>
    <a href="{{ route('admin.gallery.index') }}"
       class="nav-item flex items-center px-6 py-3 transition-colors duration-200
              {{ request()->is('admin/gallery*') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
        <i class="fas fa-images w-6"></i>
        <span class="ml-3 sidebar-text">Gallery Products</span>
    </a>
</li>


    <li>
        <a href="/analytics"
           class="nav-item flex items-center px-6 py-3 transition-colors duration-200
                  {{ request()->is('analytics') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
            <i class="fas fa-chart-bar w-6"></i>
            <span class="ml-3 sidebar-text">Analytics</span>
        </a>
    </li>

    <li>
        <a href="/settings"
           class="nav-item flex items-center px-6 py-3 transition-colors duration-200
                  {{ request()->is('settings') ? 'bg-indigo-700 text-white' : 'hover:bg-indigo-700' }}">
            <i class="fas fa-cog w-6"></i>
            <span class="ml-3 sidebar-text">Settings</span>
        </a>
    </li>
</ul>

        
        <div class="p-4 border-t border-indigo-700">
    <div class="flex items-center justify-between gap-3">
        
        <!-- Dark Mode Toggle -->
        <button id="darkModeToggle" 
            class="flex items-center px-4 py-2 w-1/2 bg-indigo-700 hover:bg-indigo-600 text-white rounded-lg transition">
            <i class="fas fa-moon w-5"></i>
            <span class="ml-2 sidebar-text">Dark</span>
        </button>

        <!-- Logout Button -->
        <form action="{{ route('admin.logout') }}" method="POST" class="w-1/2">
            @csrf
            <button type="submit" 
                class="flex items-center justify-center px-4 py-2 w-full bg-red-600 hover:bg-red-700 text-white rounded-lg transition">
                <i class="fas fa-sign-out-alt w-5"></i>
                <span class="ml-2 sidebar-text">Logout</span>
            </button>
        </form>

    </div>
</div>

    </nav>

    

    <script>
        // Toggle sidebar on desktop
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.querySelector('.content-area');
            
            sidebar.classList.toggle('sidebar-collapsed');
            
            if (sidebar.classList.contains('sidebar-collapsed')) {
                content.classList.remove('md:ml-64');
                content.classList.add('md:ml-20');
            } else {
                content.classList.remove('md:ml-20');
                content.classList.add('md:ml-64');
            }
        });
        
        // Toggle sidebar on mobile
        document.getElementById('mobileMenuToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-closed');
        });
        
        // Close sidebar on mobile using the close button
        document.getElementById('mobileCloseButton').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.add('sidebar-closed');
        });
        
        // Dark mode toggle
        document.getElementById('darkModeToggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            
            const icon = this.querySelector('i');
            const text = this.querySelector('.sidebar-text');
            if (document.body.classList.contains('dark-mode')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                if (text) text.textContent = 'Light Mode';
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                if (text) text.textContent = 'Dark Mode';
            }
        });
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const menuToggle = document.getElementById('mobileMenuToggle');
            
            if (window.innerWidth < 768 && 
                !sidebar.contains(event.target) && 
                !menuToggle.contains(event.target) && 
                !sidebar.classList.contains('sidebar-closed')) {
                sidebar.classList.add('sidebar-closed');
            }
        });

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
                        fill: true,
                        borderWidth: 2
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
                            },
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
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
                                    size: 12
                                },
                                padding: 15
                            }
                        }
                    },
                    cutout: '65%'
                }
            });
        });
    </script>
</body>
</html>