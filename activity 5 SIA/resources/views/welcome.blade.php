<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Integration App - Role-Based Authentication System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .fade-in { animation: fadeIn 0.8s ease-out; }
        .slide-in { animation: slideIn 0.6s ease-out; }
        .pulse-hover:hover { animation: pulse 0.3s ease-in-out; }
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
    <!-- Navigation -->
    <header class="bg-white shadow-lg">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="gradient-bg p-2 rounded-lg">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-3">
                        <h1 class="text-xl font-bold text-gray-900">Integration App</h1>
                        <p class="text-xs text-gray-500">Role-Based Authentication System</p>
                    </div>
                </div>
                
                @if (Route::has('login'))
                    <div class="flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 pulse-hover">
                                <i class="fas fa-tachometer-alt mr-2"></i>
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-100 transition-all duration-200">
                                <i class="fas fa-sign-in-alt mr-2"></i>
                                Login
                            </a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-gradient-to-r from-green-500 to-teal-600 text-white px-4 py-2 rounded-lg hover:from-green-600 hover:to-teal-700 transition-all duration-200 pulse-hover">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Register
                                </a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center fade-in">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full mb-6">
                <i class="fas fa-users-cog text-white text-3xl"></i>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Welcome to Integration App
            </h2>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                A powerful role-based authentication system with Admin and User dashboards, featuring modern UI design and seamless user management.
            </p>
            
            @guest
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 bg-gradient-to-r from-green-500 to-teal-600 text-white font-semibold rounded-lg hover:from-green-600 hover:to-teal-700 transition-all duration-200 transform hover:scale-105 card-hover">
                        <i class="fas fa-user-plus mr-2"></i>
                        Register
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-3 bg-white text-gray-700 font-semibold rounded-lg border border-gray-300 hover:bg-gray-50 transition-all duration-200 transform hover:scale-105 card-hover">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Login
                    </a>
                </div>
            @endguest
        </div>

        <!-- Features Section -->
        <section class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl shadow-xl p-6 card-hover slide-in" style="animation-delay: 0.1s">
                <div class="bg-gradient-to-r from-red-500 to-orange-600 p-3 rounded-lg w-fit mb-4">
                    <i class="fas fa-user-shield text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Admin Dashboard</h3>
                <p class="text-gray-600 mb-4">Complete admin control with user management, statistics, and system monitoring capabilities.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li><i class="fas fa-check text-green-500 mr-2"></i>User Management</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>System Statistics</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Advanced Search</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 card-hover slide-in" style="animation-delay: 0.2s">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-3 rounded-lg w-fit mb-4">
                    <i class="fas fa-user text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">User Dashboard</h3>
                <p class="text-gray-600 mb-4">Clean user interface with essential features for regular users to manage their profiles.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Profile Management</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>User Directory</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Weather Integration</li>
                </ul>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-6 card-hover slide-in" style="animation-delay: 0.3s">
                <div class="bg-gradient-to-r from-purple-500 to-pink-600 p-3 rounded-lg w-fit mb-4">
                    <i class="fas fa-cogs text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Modern Features</h3>
                <p class="text-gray-600 mb-4">Built with Laravel and Tailwind CSS for a responsive, accessible, and modern user experience.</p>
                <ul class="text-sm text-gray-500 space-y-2">
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Role-Based Access</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Real-time Weather</li>
                    <li><i class="fas fa-check text-green-500 mr-2"></i>Responsive Design</li>
                </ul>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="mt-20 bg-white rounded-2xl shadow-xl p-8 fade-in">
            <h3 class="text-2xl font-bold text-gray-900 text-center mb-8">System Capabilities</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 rounded-lg mb-2">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">Multi-User</p>
                    <p class="text-sm text-gray-600">Support System</p>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-r from-green-500 to-green-600 p-4 rounded-lg mb-2">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">Secure</p>
                    <p class="text-sm text-gray-600">Authentication</p>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-r from-purple-500 to-purple-600 p-4 rounded-lg mb-2">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">Responsive</p>
                    <p class="text-sm text-gray-600">Design</p>
                </div>
                <div class="text-center">
                    <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-4 rounded-lg mb-2">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-900">Fast</p>
                    <p class="text-sm text-gray-600">Performance</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-20 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-gray-400">© 2026 Integration App. Built with Laravel & Tailwind CSS.</p>
                <div class="mt-4 flex justify-center space-x-6">
                    <span class="text-sm text-gray-500">
                        <i class="fas fa-code mr-1"></i>
                        Laravel Framework
                    </span>
                    <span class="text-sm text-gray-500">
                        <i class="fas fa-paint-brush mr-1"></i>
                        Tailwind CSS
                    </span>
                    <span class="text-sm text-gray-500">
                        <i class="fas fa-database mr-1"></i>
                        MySQL Database
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
