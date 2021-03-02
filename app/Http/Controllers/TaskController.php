<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Task;

class TaskController extends Controller
{
     
    public function index()
    {   
        $tasks = Task::all();

        return view('adminTask')->with('tasks', $tasks);
    }
 

    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'assigned_user_id' => $request->assigned_user_id,
            'creator_user' => auth()->user()->name,
            'start_date' => $request->start_date,
            'limit_date' => $request->limit_date
        ]);
        
        $tasks = Task::all();

        return view('adminTask')->with('tasks', $tasks);
    }

    
    public function edit(Task $task)
    {
        return view('editTask')->with('task', $task);
    }

    
    public function update(Request $request, Task $task)
    {
        $task->update([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'limit_date' => $request->limit_date,
        ]);

        return back()->with('status', 'Datos actualizados correctamente');
    }

    
    public function destroy(Task $task)
    {
        $task->delete();

        return back();
    }


    public function getUsers() {
        // $users = User::all()->except(auth()->user()->id);
        $users = User::where('role', '!=', 'Administrador')->get();

        return view('createTask')->with('users', $users);
    }
}
