<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight border-b-4 border-[#FF2D55] inline-block pb-1">
            {{ __('Available Blood Donors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6">
                <form action="{{ route('dashboard') }}" method="GET" class="flex gap-4">
                    <select name="blood_group" class="border-gray-300 rounded-md shadow-sm w-full md:w-1/3">
                        <option value="">Search by Blood Group (All)</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                    <x-primary-button>Search</x-primary-button>
                </form>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full" style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr style="background-color: #FF2D55 !important; color: white !important;">
                            <th style="padding: 12px; text-align: left; font-size: 14px; font-weight: bold; text-transform: uppercase;">Name</th>
                            <th style="padding: 12px; text-align: left; font-size: 14px; font-weight: bold; text-transform: uppercase;">Blood Group</th>
                            <th style="padding: 12px; text-align: left; font-size: 14px; font-weight: bold; text-transform: uppercase;">Address</th>
                            <th style="padding: 12px; text-align: left; font-size: 14px; font-weight: bold; text-transform: uppercase;">Status</th>
                            <th style="padding: 12px; text-align: left; font-size: 14px; font-weight: bold; text-transform: uppercase;">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($donors as $donor)
                        <tr style="border-bottom: 1px solid #edf2f7;">
                            <td style="padding: 15px;">{{ $donor->name }}</td>
                            <td style="padding: 15px; font-weight: bold; color: #FF2D55;">{{ $donor->blood_group }}</td>
                            <td style="padding: 15px;">{{ $donor->address }}</td>
                            <td style="padding: 15px;">
                                <span style="padding: 5px 12px; border-radius: 50px; font-size: 14px; font-weight: bold; {{ ($donor->status ?? 'Available') == 'Available' ? 'background-color: #dcfce7; color: #166534;' : 'background-color: #f3f4f6; color: #374151;' }}">
                                    {{ $donor->status ?? 'Available' }}
                                </span>
                            </td>
                            <td style="padding: 15px;">
                                <a href="{{ url('/donors/'.$donor->id) }}" style="color: #FF2D55; font-weight: bold; text-decoration: underline;">Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>