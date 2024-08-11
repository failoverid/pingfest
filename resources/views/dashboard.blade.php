<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex">
                    <!-- Left Box: IT-Venture Dashboard -->
                    <div class="w-1/2 p-4">
                        <div class="border-2 border-gray-300 rounded-lg p-6 text-center">
                            <h3 class="text-lg font-semibold mb-4">IT-Venture Dashboard</h3>
                            <a href="/it-venture" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Akses Dashboard</a>
                        </div>
                    </div>

                    <!-- Right Box: SemNas Dashboard -->
                    <div class="w-1/2 p-4">
                        <div class="border-2 border-gray-300 rounded-lg p-6 text-center">
                            <h3 class="text-lg font-semibold mb-4">SemNas Dashboard</h3>
                            <a href="{{ route('semnas.dashboard') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Akses Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
