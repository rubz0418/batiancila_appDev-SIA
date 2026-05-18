<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="h-9 w-9 rounded-lg bg-red-500">
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">Admin Dashboard</h2>
                    <p class="text-gray-700 text-xs">Welcome back, {{ auth()->user()->full_name }}!</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-gray-800 text-white px-3 py-2 rounded-lg">
                    <p class="text-xs font-medium">Admin User</p>
                    <p class="text-sm font-semibold">{{ auth()->user()->email }}</p>
                </div>
                <div class="h-3 w-3 rounded-full bg-red-500">
                </div>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2.5 px-5 rounded-lg transition-colors duration-200">
                        {{ __('Log out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="bg-slate-50 min-h-screen -mx-4 -my-6 px-4 py-6">
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <!-- Admin Stats Cards -->
            <section class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 justify-items-center mb-8">
                <div class="aspect-square w-full max-w-56 rounded-xl border border-slate-200 bg-white p-5 text-slate-900 shadow-sm fade-in">
                    <div class="flex h-full flex-col-reverse justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Total users</p>
                            <p class="mt-1 text-4xl font-semibold tracking-tight">{{ $stats['total_users'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="9" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="aspect-square w-full max-w-56 rounded-xl border border-slate-200 bg-white p-5 text-slate-900 shadow-sm fade-in" style="animation-delay: 0.1s">
                    <div class="flex h-full flex-col-reverse justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Admin users</p>
                            <p class="mt-1 text-4xl font-semibold tracking-tight">{{ $stats['admin_users'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-red-50 text-red-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M20 13c0 5-3.5 7.5-8 8.5C7.5 20.5 4 18 4 13V5l8-3 8 3v8Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                                <path d="m9 12 2 2 4-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="aspect-square w-full max-w-56 rounded-xl border border-slate-200 bg-white p-5 text-slate-900 shadow-sm fade-in" style="animation-delay: 0.2s">
                    <div class="flex h-full flex-col-reverse justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Regular users</p>
                            <p class="mt-1 text-4xl font-semibold tracking-tight">{{ $stats['regular_users'] }}</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                    </div>
                </div>
                
                <div class="aspect-square w-full max-w-56 rounded-xl border border-slate-200 bg-white p-5 text-slate-900 shadow-sm fade-in" style="animation-delay: 0.3s">
                    <div class="flex h-full flex-col-reverse justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500">Temperature</p>
                            <p class="mt-1 text-4xl font-semibold tracking-tight">{{ $weather['temperature'] ?? '--' }}°C</p>
                        </div>
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-orange-50 text-orange-600">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M14 14.76V5a2 2 0 1 0-4 0v9.76a4 4 0 1 0 4 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 19v-4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Search Section -->
            <section class="mb-8 fade-in" style="animation-delay: 0.4s">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center mb-4">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-slate-100 text-slate-600 mr-3">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="m21 21-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-slate-900">Search users</h2>
                    </div>
                    <form method="GET" action="/admin/dashboard" class="flex flex-col sm:flex-row gap-3">
                        <div class="flex-1 relative">
                            <input type="text" 
                                   name="search" 
                                   value="{{ $search ?? '' }}" 
                                   placeholder="Search users by name, full name, or email..." 
                                   class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all duration-200">
                        </div>
                        <button type="submit" class="px-6 py-3 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 transition-colors duration-200">
                            Search
                        </button>
                        @if($search)
                            <a href="/admin/dashboard" class="px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-lg hover:bg-slate-200 transition-colors duration-200">
                                Clear
                            </a>
                        @endif
                    </form>
                </div>
            </section>

            <!-- Recent Users Section -->
            <section class="mb-8 fade-in" style="animation-delay: 0.5s">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center mb-6">
                        <div class="h-2.5 w-2.5 rounded-full bg-slate-400 mr-3">
                        </div>
                        <h2 class="text-lg font-bold text-gray-900">Recent Registrations</h2>
                    </div>
                    
                    <div class="space-y-3">
                        @foreach($stats['recent_users'] as $user)
                            <div class="bg-slate-50 rounded-lg p-4 border border-slate-200 hover:border-slate-300 transition-colors duration-200">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-xs font-semibold text-slate-700 mr-3">
                                            {{ strtoupper(substr($user->full_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-sm text-gray-900">{{ $user->full_name }}</h3>
                                            <p class="text-xs text-gray-600">{{ $user->email }}</p>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-{{ $user->role === 'admin' ? 'red' : 'blue' }}-100 text-{{ $user->role === 'admin' ? 'red' : 'blue' }}-800 mt-1">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-400">
                                        {{ $user->created_at->format('M j, Y H:i') }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- All Users Section -->
            <section class="mb-8 fade-in" style="animation-delay: 0.6s">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="h-2.5 w-2.5 rounded-full bg-slate-400 mr-3">
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">All Users (Admin View)</h2>
                        </div>
                        @if($search)
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">
                                {{ $users->count() }} results for "{{ $search }}"
                            </span>
                        @endif
                    </div>
                    
                    @if($users->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($users as $user)
                                <div class="bg-slate-50 rounded-lg p-4 border border-slate-200 hover:border-slate-300 transition-colors duration-200">
                                    <div class="flex items-center mb-3">
                                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-slate-200 text-xs font-semibold text-slate-700 mr-3">
                                            {{ strtoupper(substr($user->full_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-sm text-gray-900">{{ $user->full_name }}</h3>
                                            <p class="text-xs text-gray-600">{{ $user->email }}</p>
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-{{ $user->role === 'admin' ? 'red' : 'blue' }}-100 text-{{ $user->role === 'admin' ? 'red' : 'blue' }}-800 mt-1">
                                                {{ ucfirst($user->role) }}
                                            </span>
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
                            <p class="text-gray-500 text-base">No users found</p>
                            <p class="text-gray-400 text-xs mt-2">Try adjusting your search criteria</p>
                        </div>
                    @endif
                </div>
            </section>

            <!-- Weather Section -->
            <section class="fade-in" style="animation-delay: 0.7s">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center mb-6">
                        <div class="h-2.5 w-2.5 rounded-full bg-slate-400 mr-3">
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
                        <div class="bg-slate-50 rounded-xl p-6 border border-slate-200">
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
