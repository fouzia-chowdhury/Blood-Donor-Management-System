<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blood Requests Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-xl p-8 border-t-4 border-red-500">
                
                <h3 class="text-xl font-bold text-gray-800 mb-6">Recent Blood Requests</h3>

                @if($requests->isEmpty())
                    <div class="text-center py-12">
                        <p class="text-gray-400 text-lg">No requests received yet.</p>
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach($requests as $request)
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-100">
                                
                                <div class="flex items-center space-x-4">
                                    <span class="text-base font-bold text-gray-800">{{ $request->seeker->name }}</span>
                                    <span class="text-gray-300">|</span>
                                    <span class="text-sm font-medium text-gray-600">Address: {{ $request->seeker->address ?? 'N/A' }}</span>
                                    <span class="text-gray-300">|</span>
                                    <span class="text-gray-500 text-xs italic">{{ $request->created_at->diffForHumans() }}</span>
                                </div>

                                <div>
                                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest {{ $request->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-green-100 text-green-700' }}">
                                        {{ $request->status }}
                                    </span>
                                </div>

                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="mt-8">
                    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline text-sm font-medium">
                        &larr; Back to Dashboard
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>