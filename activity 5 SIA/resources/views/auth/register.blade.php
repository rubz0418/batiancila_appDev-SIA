<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Integration App</title>
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
        .fade-in { animation: fadeIn 0.8s ease-out; }
        .slide-in { animation: slideIn 0.6s ease-out; }
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
<body class="min-h-screen bg-gradient-to-br from-green-50 via-teal-50 to-blue-100 flex items-center justify-center">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-white/50 backdrop-blur-sm"></div>
    
    <!-- Register Container -->
    <div class="relative z-10 w-full max-w-md px-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8 card-hover fade-in">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-green-500 to-teal-600 rounded-full mb-4">
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h2>
                <p class="text-gray-600">Join our platform and get started</p>
            </div>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div class="slide-in" style="animation-delay: 0.1s">
                    <label for="full_name" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user text-gray-400 mr-2"></i>
                        Full Name
                    </label>
                    <input 
                        id="full_name" 
                        name="full_name" 
                        type="text" 
                        value="{{ old('full_name') }}" 
                        required 
                        autofocus 
                        autocomplete="name"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                        placeholder="Enter your full name"
                    >
                    @if ($errors->has('full_name'))
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $errors->first('full_name') }}
                        </p>
                    @endif
                </div>

                <!-- Role -->
                <div class="slide-in" style="animation-delay: 0.2s">
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-user-tag text-gray-400 mr-2"></i>
                        Role
                    </label>
                    <select 
                        id="role" 
                        name="role" 
                        required
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                    >
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                    @if ($errors->has('role'))
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $errors->first('role') }}
                        </p>
                    @endif
                </div>

                <!-- Email Address -->
                <div class="slide-in" style="animation-delay: 0.3s">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-envelope text-gray-400 mr-2"></i>
                        Email Address
                    </label>
                    <input 
                        id="email" 
                        name="email" 
                        type="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="username"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                        placeholder="Enter your email"
                    >
                    @if ($errors->has('email'))
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <!-- Password -->
                <div class="slide-in" style="animation-delay: 0.4s">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-gray-400 mr-2"></i>
                        Password
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                        placeholder="Create a password"
                    >
                    @if ($errors->has('password'))
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="slide-in" style="animation-delay: 0.5s">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fas fa-lock text-gray-400 mr-2"></i>
                        Confirm Password
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-200"
                        placeholder="Confirm your password"
                    >
                    @if ($errors->has('password_confirmation'))
                        <p class="mt-2 text-sm text-red-600 flex items-center">
                            <i class="fas fa-exclamation-circle mr-1"></i>
                            {{ $errors->first('password_confirmation') }}
                        </p>
                    @endif
                </div>

                <!-- Submit Button -->
                <div class="slide-in" style="animation-delay: 0.6s">
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-green-500 to-teal-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-green-600 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105"
                    >
                        <i class="fas fa-user-plus mr-2"></i>
                        Register
                    </button>
                </div>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center slide-in" style="animation-delay: 0.7s">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-green-600 hover:text-green-800 transition-colors duration-200">
                        Login here
                    </a>
                </p>
            </div>

            <!-- Back to Home -->
            <div class="mt-4 text-center slide-in" style="animation-delay: 0.8s">
                <a href="/" class="text-sm text-gray-500 hover:text-gray-700 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</body>
</html>
