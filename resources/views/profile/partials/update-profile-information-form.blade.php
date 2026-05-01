<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">{{ __('Profile Information') }}</h2>
        <p class="mt-1 text-sm text-gray-600">{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="blood_group" :value="__('Blood Group')" />
            <select id="blood_group" name="blood_group" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                    <option value="{{ $group }}" {{ old('blood_group', $user->blood_group) == $group ? 'selected' : '' }}>{{ $group }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" />
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age', $user->age)" />
            </div>
            <div>
                <x-input-label for="height" :value="__('Height')" />
                <x-text-input id="height" name="height" type="text" class="mt-1 block w-full" :value="old('height', $user->height)" />
            </div>
            <div>
                <x-input-label for="weight" :value="__('Weight')" />
                <x-text-input id="weight" name="weight" type="number" class="mt-1 block w-full" :value="old('weight', $user->weight)" />
            </div>
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <textarea id="address" name="address" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">{{ old('address', $user->address) }}</textarea>
        </div>

        <div>
            <x-input-label for="last_donation_date" :value="__('Last Donation Date')" />
            <x-text-input id="last_donation_date" name="last_donation_date" type="date" class="mt-1 block w-full" :value="old('last_donation_date', $user->last_donation_date)" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button style="background-color: #FF2D55;">{{ __('Update Information') }}</x-primary-button>
        </div>
    </form>
</section>