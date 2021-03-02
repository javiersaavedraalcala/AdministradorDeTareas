<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administer tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('newTask') }}" class="bg-green-300 font-bold py-2 px-3 uppercase border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300 focus:bg-white">Nueva tarea</a>

                    <table class="table w-6/12 sm:w-full mt-5 rounded-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Usuario asignado</th>
                                <th>Usuario creador</th>
                                <th>Fecha inicio</th>
                                <th>Fecha limite</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->name }}</td> 
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->creator_user }}</td>
                                <td>{{ $task->start_date }}</td>
                                <td>{{ $task->limit_date }}</td>
                                <td class="text-center">

                                    <span class="inline-flex">
                                        @if ($task->creator_user == Auth::user()->name)
                                        <a href="{{ route('usertask.edit', $task) }}" class="rounded-sm p-0.5 bg-blue-600 mr-1 h-full"><img src="{{ asset('images/pen.png') }}" class="w-7"></a> 
                                        @endif
                                        <form action="{{ route('usertask.destroy', $task) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            @if ($task->creator_user == Auth::user()->name)
                                            <button class="rounded-sm p-0.5 bg-red-400" onclick="return confirm('¿Estas segur@ de eliminar esta tarea?...')">
                                                <svg class="w-7 text-gray-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>  
                                            @endif
                                            <button class="rounded-sm p-0.5 bg-green-400" onclick="return confirm('Si estas segur@ de finalizar esta tarea sólo presiona en continuar...')">
                                                <svg class="w-7 text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                            </button>  
                                        </form>
                                    </span>
                                </td> 
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
