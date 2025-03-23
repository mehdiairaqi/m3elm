<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <!-- Load Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Load Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Container -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-100 border-b border-gray-200">
                    <!-- User Info Section -->
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-blue-800">{{ __('Welcome back, ') }}{{ Auth::user()->name }}</h3>
                            <p class="text-sm text-gray-600">{{ __('Here is your account information.') }}</p>
                        </div>
                    </div>

                    <!-- User Information Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-4 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-blue-800">{{ __('User Information') }}</h4>
                            <p class="mt-2"><strong>{{ __('Name:') }}</strong> {{ Auth::user()->name }}</p>
                            <p><strong>{{ __('Email:') }}</strong> {{ Auth::user()->email }}</p>
                            <p><strong>{{ __('Role:') }}</strong> 
                                @if(Auth::user()->role == 'admin')
                                    {{ 'Admin' }}
                                @elseif(Auth::user()->role == 'expert')
                                    {{ 'Expert' }}
                                @else
                                    {{ 'Buyer' }}
                                @endif
                            </p>
                            <p><strong>{{ __('Account Created On:') }}</strong> {{ Auth::user()->created_at->format('M d, Y') }}</p>
                        </div>

                        <div class="bg-blue-50 p-4 rounded-lg shadow-md">
                            <h4 class="text-xl font-semibold text-blue-800">{{ __('Account Status') }}</h4>
                            <p class="mt-2"><strong>{{ __('Status:') }}</strong> 
                                @if(Auth::user()->role == 'admin')
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-red-500 text-white">{{ 'Admin' }}</span>
                                @elseif(Auth::user()->role == 'expert')
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-green-500 text-white">{{ 'Expert' }}</span>
                                @else
                                    <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full bg-yellow-500 text-white">{{ 'Buyer' }}</span>
                                @endif
                            </p>
                            <p><strong>{{ __('Last Login:') }}</strong> {{ Auth::user()->last_login_at ? Auth::user()->last_login_at->format('M d, Y H:i') : 'N/A' }}</p>
                        </div>
                    </div>
                    <br>

                    <!-- Role Switching Logic -->
                    <div class="mt-8">
                        @if(auth()->user()->role == 'buyer')
                            <!-- Button to switch from buyer to expert -->
                            <div class="d-flex justify-content-center">
                                <form action="{{ route('user.switchToExpert') }}" method="POST" class="w-100 max-w-xs">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-md">
                                        Become an Expert
                                    </button>
                                </form>
                            </div>
                        @elseif(auth()->user()->role == 'expert')
                            <!-- Button to switch from expert to buyer -->
                            <div class="d-flex justify-content-center">
                                <form action="{{ route('user.switchToBuyer') }}" method="POST" class="w-100 max-w-xs">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-md">
                                        Switch to Buyer
                                    </button>
                                </form>
                            </div>
                    
                            <!-- "Enter Your Dashboard" button for experts -->
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('index') }}" class="btn btn-success w-100 py-3 rounded-md">
                                    Enter Your Dashboard
                                </a><br><br>
                            </div>
                        @elseif(auth()->user()->role == 'admin')
                            <!-- Admin Specific Options -->
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger w-100 py-3 rounded-md">
                                    Go to Admin Dashboard
                                </a>
                            </div>
                            <!-- Add Expert Button Visible Only for Admin -->
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('experts.create') }}" class="btn btn-primary w-100 py-3 rounded-md">
                                    Add an Expert
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- Display Success Message -->
                    @if(session('success'))
                        <div class="mt-6 p-4 bg-green-200 border-l-4 border-green-600 text-green-900 rounded-md">
                            <p class="font-semibold">{{ session('success') }}</p>
                        </div>
                    @endif

                    <!-- Display Error Message -->
                    @if(session('error'))
                        <div class="mt-6 p-4 bg-red-200 border-l-4 border-red-600 text-red-900 rounded-md">
                            <p class="font-semibold">{{ session('error') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>