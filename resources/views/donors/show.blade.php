<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donor Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <h3 class="text-xl font-bold mb-6 text-gray-800 border-b pb-2">Donor Information</h3>

                <div class="space-y-4 text-lg">
                    <p><strong>Name:</strong> {{ $donor->name }}</p>
                    <p><strong>Email:</strong> {{ $donor->email }}</p>
                    <p><strong>Blood Group:</strong> <span style="color: #FF2D55; font-weight: bold;">{{ $donor->blood_group }}</span></p>
                    <p><strong>Phone:</strong> {{ $donor->phone ?? 'Not Provided' }}</p>
                    <p><strong>Age:</strong> {{ $donor->age ?? 'N/A' }} Years</p>
                    <p><strong>Height:</strong> {{ $donor->height ?? 'N/A' }}</p>
                    <p><strong>Weight:</strong> {{ $donor->weight ?? 'N/A' }} kg</p>
                    <p><strong>Last Donation:</strong> {{ $donor->last_donation_date ?? 'Never' }}</p>
                    <p><strong>Address:</strong> {{ $donor->address }}</p>
                </div>

                <div class="mt-6">
                    @if(session('success'))
                        <div class="p-3 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="p-3 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">{{ session('error') }}</div>
                    @endif
                </div>

                <div class="mt-10 flex flex-wrap gap-4">
                    
                    <a href="{{ route('dashboard') }}" 
                       class="transition duration-300 ease-in-out hover:bg-gray-800"
                       style="background-color: #FF2D55; color: white; padding: 12px 25px; border-radius: 6px; font-weight: bold; text-transform: uppercase; text-decoration: none; display: inline-block; font-size: 14px;">
                        Back to Dashboard
                    </a>

                    <form action="{{ route('blood.request', $donor->id) }}" method="POST" style="margin: 0;">
                        @csrf
                        <button type="submit" 
                                class="transition duration-300 ease-in-out hover:bg-green-600"
                                style="background-color: #ff2d55; color: white; padding: 12px 25px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold; text-transform: uppercase; font-size: 14px;">
                            SEND BLOOD REQUEST
                        </button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</x-app-layout>