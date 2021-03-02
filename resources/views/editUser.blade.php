<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 mx-auto max-w-md bg-white border-b border-gray-200">
                    @if (session('status'))
                        <div class="mt-3 list-disc list-inside text-sm text-center text-green-300">
                            {{ session('status') }}
                        </div>
                    @endif
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="post" action="{{ route('user.update', $user) }}">
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
                            <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email', $user->email)" autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" />
                        </div>
                        <div class="mt-4">
                            <label for="role" class="block text-sm font-medium text-gray-700">{{ __('Role') }}</label>
                            <select id="role" name="role" autocomplete="{{ __('Role') }}" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">

                                @if($user->role == 'Usuario')
                                <option selected value="Usuario">{{ __('User') }}</option> 
                                @else
                                <option value="Usuario">{{ __('User') }}</option> 
                                @endif

                                @if($user->role == 'Administrador')
                                <option selected value="Administrador">{{ __('Administrator') }}</option> 
                                @else
                                <option value="Administrador">{{ __('Administrator') }}</option> 
                                @endif
                            </select>
                          </div>
                        <div class="flex items-center justify-end mt-4">
                            @csrf
                            @method('PUT')
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
