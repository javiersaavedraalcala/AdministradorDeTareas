<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 mx-auto max-w-md bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('task.store') }}">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <label for="assigned_user" class="block text-sm font-medium text-gray-700">{{ __('Assigned user') }}</label>
                            <select id="assigned_user" name="assigned_user_id" autocomplete="{{ __('Assigned user') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" required>
                                <option value="">{{ __('Select one') }}</option> 
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="start_date" :value="__('Start date')" />
                            <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date')" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="limit_date" :value="__('Limit_date')" />
                            <x-input id="limit_date" class="block mt-1 w-full" type="date" name="limit_date" :value="old('limit_date')" required />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
