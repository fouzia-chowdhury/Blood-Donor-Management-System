<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center px-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Donor Dashboard') }}
            </h2>

            <div class="relative">
                <a href="{{ route('donor.notifications') }}" class="text-gray-500 hover:text-[#FF2D55] transition p-2 inline-block relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>

                    {{-- counter logic --}}
                    @php
                        $count = \App\Models\BloodRequest::where('donor_id', auth()->id())
                                                         ->where('status', 'pending')
                                                         ->count();
                    @endphp

                    {{-- request pending thakle red number show hobe --}}
                    @if($count > 0)
                        <span class="absolute top-1 right-1 flex h-5 w-5 items-center justify-center rounded-full bg-[#FF2D55] text-[10px] font-bold text-white border-2 border-white">
                            {{ $count }}
                        </span>
                    @endif
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl p-10 border-t-8 border-[#FF2D55]">
                
                <div class="flex items-center justify-between mb-10 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <div class="px-4">
                        <h4 class="font-bold text-gray-800 text-lg">Availability Status</h4>
                        <p class="text-sm mt-1">Currently: <span class="{{ Auth::user()->is_available ? 'text-green-600' : 'text-red-500' }} font-bold uppercase">{{ Auth::user()->is_available ? 'Available' : 'Unavailable' }}</span></p>
                    </div>
                    
                    <form action="{{ route('profile.update-status') }}" method="POST" class="px-4">
                        @csrf
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_available" onchange="this.form.submit()" class="sr-only peer" {{ Auth::user()->is_available ? 'checked' : '' }}>
                            <div class="w-14 h-7 bg-gray-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#FF2D55]"></div>
                            <span class="ml-3 text-sm font-bold text-gray-700 uppercase w-8">{{ Auth::user()->is_available ? 'ON' : 'OFF' }}</span>
                        </label>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-12 text-gray-700 px-6">
                    <div class="space-y-4">
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Name:</strong> <span>{{ Auth::user()->name }}</span></p>
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Email:</strong> <span>{{ Auth::user()->email }}</span></p>
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Blood Group:</strong> <span class="text-[#FF2D55] font-extrabold text-2xl">{{ Auth::user()->blood_group }}</span></p>
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Phone:</strong> <span>{{ Auth::user()->phone ?? 'N/A' }}</span></p>
                    </div>
                    
                    <div class="space-y-4">
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Age:</strong> <span>{{ Auth::user()->age ?? 'N/A' }} Years</span></p>
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Height:</strong> <span>{{ Auth::user()->height ?? 'N/A' }}</span></p>
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Weight:</strong> <span>{{ Auth::user()->weight ?? 'N/A' }} kg</span></p>
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Last Donation:</strong> <span>{{ Auth::user()->last_donation_date ?? 'Never' }}</span></p>
                    </div>

                    <div class="md:col-span-2 mt-4">
                        <p class="flex justify-between border-b border-gray-50 pb-2"><strong>Address:</strong> <span>{{ Auth::user()->address }}</span></p>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t flex justify-start px-6">
                    <a href="{{ route('profile.edit') }}" 
                       style="background-color: #FF2D55; color: white; padding: 12px 40px; border-radius: 10px; font-weight: bold; text-transform: uppercase; text-decoration: none; display: inline-block; box-shadow: 0 4px 14px 0 rgba(255, 45, 85, 0.39); transition: all 0.3s ease;">
                        Edit Information
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>