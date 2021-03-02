<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit task') }}
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
                    <form method="post" action="{{ route('task.update', $task) }}">
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $task->name)" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-label for="start_date" :value="__('Start date')" />
                            <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date', $task->start_date)" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="limit_date" :value="__('Limit_date')" />
                            <x-input id="limit_date" class="block mt-1 w-full" type="date" name="limit_date" :value="old('limit_date', $task->limit_date)" required />
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
