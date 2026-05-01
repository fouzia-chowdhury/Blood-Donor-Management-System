<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="role" :value="__('Register As')" />
            <select id="role" name="role" class="block mt-1 w-full border-gray-300 focus:border-[#FF2D55] focus:ring-[#FF2D55] rounded-md shadow-sm" required>
                <option value="donor" {{ old('role') == 'donor' ? 'selected' : '' }}>Blood Donor</option>
                <option value="seeker" {{ old('role') == 'seeker' ? 'selected' : '' }}>Blood Seeker</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="blood_group" :value="__('Blood Group')" />
            <select id="blood_group" name="blood_group" class="block mt-1 w-full border-gray-300 focus:border-[#FF2D55] focus:ring-[#FF2D55] rounded-md shadow-sm" required>
                <option value="">Select Blood Group</option>
                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="A+" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="O+" {{ old('blood_group') == 'O-' ? 'selected' : '' }}>O-</option>
                <option value="AB+" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                </select>
            <x-input-error :messages="$errors->get('blood_group')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-[#FF2D55] rounded-md focus:outline-none" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4 bg-[#FF2D55] hover:bg-[#e6294d]">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>