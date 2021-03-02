<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\Task;



class UserTasksController extends Controller
{
     
    public function index()
    {
        
        $tasks = Task::where('assigned_user_id', '=', auth()->user()->id)->get();
        
        return view('myTasks')->with('tasks', $tasks);
    }
 
    
    public function store(Request $request)
    {
        $task = Task::create([
            'name' => $request->name,
            'assigned_user_id' => auth()->user()->id,
            'creator_user' => auth()->user()->name,
            'start_date' => $request->start_date,
            'limit_date'=> $request->limit_date
        ]);
        
        $tasks = Task::where('assigned_user_id', '=', auth()->user()->id)->get();
        
        return view('myTasks')->with('tasks', $tasks);
    }

    
    public function edit(Task $usertask)
    {

        return view('editUserTask')->with('task', $usertask);
    }

 
    public function update(Request $request, Task $usertask)
    {
        $usertask->update([
            'name' => $request->name,
            'star_date' => $request->start_date,
            'limit_date' => $request->limit_date
        ]);

        return back()->with('status', 'Datos actualizados exitosamente');
    }


    public function destroy(Task $usertask)
    {

        $usertask->delete(); 

        return back();
    }
}
