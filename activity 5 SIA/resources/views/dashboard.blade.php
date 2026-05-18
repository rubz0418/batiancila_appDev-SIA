<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-3 rounded-lg">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Dashboard</h2>
                    <p class="text-gray-600 text-xs">Welcome back, {{ auth()->user()->name }}!</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <p class="text-xs text-gray-500">Logged in as</p>
                    <p class="font-medium text-sm text-gray-900">{{ auth()->user()->email }}</p>
                </div>
                <div class="bg-gradient-to-r from-purple-500 to-pink-500 p-2 rounded-full">
                    <i class="fas fa-user text-white"></i>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition-colors duration-200">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        {{ __('Log out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen -mx-4 -my-6 px-4 py-6">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Search Section -->
            <section class="mb-8 fade-in">
                <div class="bg-white rounded-2xl shadow-xl p-6 card-hover">
                    <div class="flex items-center mb-4">
                        <div class="bg-gradient-to-r from-green-500 to-teal-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-search text-white"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Search Users</h2>
                    </div>
                    <form method="GET" action="/dashboard" class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1 relative">
                            <input type="text" 
                                   name="search" 
                                   value="{{ $search ?? '' }}" 
                                   placeholder="Search users by name..." 
                                   class="w-full px-4 py-3 pl-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <i class="fas fa-search absolute left-4 top-4 text-gray-400"></i>
                        </div>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-search mr-2"></i>Search
                        </button>
                        @if($search)
                            <a href="/dashboard" class="px-6 py-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition-all duration-200">
                                <i class="fas fa-times mr-2"></i>Clear
                            </a>
                        @endif
                    </form>
                </div>
            </section>

            <!-- Stats Cards -->
            <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-2xl shadow-xl p-6 text-white card-hover fade-in">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-xs">Total Users</p>
                            <p class="text-lg font-bold">{{ $users->count() }}</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-users text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl shadow-xl p-6 text-white card-hover fade-in" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-xs">Temperature</p>
                            <p class="text-lg font-bold">{{ $weather['temperature'] ?? '--' }}°C</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-temperature-high text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-2xl shadow-xl p-6 text-white card-hover fade-in" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-purple-100 text-xs">Search Results</p>
                            <p class="text-lg font-bold">{{ $search ? $users->count() : 'All' }}</p>
                        </div>
                        <div class="bg-white/20 p-3 rounded-lg">
                            <i class="fas fa-filter text-xl"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Users Section -->
            <section class="mb-8 fade-in" style="animation-delay: 0.3s">
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 p-2 rounded-lg mr-3">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">Users Database</h2>
                        </div>
                        @if($search)
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                {{ $users->count() }} results for "{{ $search }}"
                            </span>
                        @endif
                    </div>
                    
                    @if($users->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($users as $user)
                                <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-4 border border-gray-200 hover:border-blue-300 transition-all duration-200 card-hover">
                                    <div class="flex items-center mb-3">
                                        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 p-2 rounded-full mr-3">
                                            <i class="fas fa-user text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-sm text-gray-900">{{ $user->name }}</h3>
                                            <p class="text-xs text-gray-600">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-xs text-gray-400">
                                        <i class="fas fa-clock mr-1 text-xs"></i>
                                        {{ $user->created_at->format('M j, Y') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="bg-gray-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                                <i class="fas fa-users-slash text-gray-400 text-2xl"></i>
                            </div>
                            <p class="text-gray-500 text-base">No users found in database</p>
                            <p class="text-gray-400 text-xs mt-2">Try adjusting your search or add some users to get started</p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Weather Section -->
            <section class="fade-in" style="animation-delay: 0.4s">
                <div class="bg-white rounded-2xl shadow-xl p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-gradient-to-r from-blue-500 to-cyan-500 p-2 rounded-lg mr-3">
                            <i class="fas fa-cloud-sun text-white"></i>
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Weather Data</h2>
                    </div>
                    
                    @if($apiError)
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <div class="bg-red-100 p-2 rounded-lg mr-3">
                                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                                </div>
                                <div>
                                    <p class="text-red-800 text-sm font-medium">Weather API Error</p>
                                    <p class="text-red-600 text-xs">{{ $apiError }}</p>
                                </div>
                            </div>
                        </div>
                    @elseif(!empty($weather))
                        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-200">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Main Weather Info -->
                                <div class="text-center">
                                    <div class="flex items-center justify-center mb-4">
                                        @if(!empty($weather['icon']))
                                            <img src="https://openweathermap.org/img/wn/{{ $weather['icon'] }}@2x.png" 
                                                 alt="Weather icon" 
                                                 class="w-20 h-20">
                                        @else
                                            <div class="bg-blue-100 p-4 rounded-full">
                                                <i class="fas fa-cloud text-blue-500 text-3xl"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                        {{ $weather['city'] }}, {{ $weather['country'] }}
                                    </h3>
                                    <p class="text-3xl font-bold text-blue-600 mb-2">
                                        {{ $weather['temperature'] }}°C
                                    </p>
                                    <p class="text-gray-600 capitalize">{{ $weather['description'] }}</p>
                                </div>
                                
                                <!-- Weather Details -->
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between bg-white/50 rounded-lg p-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-thermometer-half text-orange-500 mr-2"></i>
                                            <span class="text-sm text-gray-600">Feels like</span>
                                        </div>
                                        <span class="font-semibold text-gray-900">{{ $weather['feels_like'] }}°C</span>
                                    </div>
                                    
                                    <div class="flex items-center justify-between bg-white/50 rounded-lg p-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-tint text-blue-500 mr-2"></i>
                                            <span class="text-sm text-gray-600">Humidity</span>
                                        </div>
                                        <span class="font-semibold text-gray-900">{{ $weather['humidity'] }}%</span>
                                    </div>
                                    
                                    <div class="flex items-center justify-between bg-white/50 rounded-lg p-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-wind text-gray-500 mr-2"></i>
                                            <span class="text-sm text-gray-600">Wind Speed</span>
                                        </div>
                                        <span class="font-semibold text-gray-900">{{ $weather['wind_speed'] }} m/s</span>
                                    </div>
                                    
                                    <div class="flex items-center justify-between bg-white/50 rounded-lg p-3">
                                        <div class="flex items-center">
                                            <i class="fas fa-compress text-purple-500 mr-2"></i>
                                            <span class="text-sm text-gray-600">Pressure</span>
                                        </div>
                                        <span class="font-semibold text-gray-900">{{ $weather['pressure'] }} hPa</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="bg-gray-100 rounded-full p-4 w-16 h-16 mx-auto mb-4">
                                <i class="fas fa-cloud-sun text-gray-400 text-2xl"></i>
                            </div>
                            <p class="text-gray-500 text-base">No weather data available</p>
                            <p class="text-gray-400 text-xs mt-2">The weather API is currently unavailable</p>
                        </div>
                    @endif
                </div>
            </section>
        </main>
    </div>
</x-app-layout>
