<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.task', compact('tasks'));
    }

    public function create()
    {    
        $tasks=Task::all();
        return view('tasks.createTask',compact('tasks')); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status'=>'required',
            
            
        ]);

       $task= new Task();
       $task->title=$request->title;
       $task->description=$request->description;
       $task->status=$request->status;
       $task->user_id=Auth::user()->id;
       $task->save();

        return redirect()->route('home')->with('success', 'task item created successfully.');
    }

    public function edit( $task)
    {

        $task=Task::where('id',$task)->first();
        return view('tasks.editTask', compact('task'));
    }

    public function update(Request $request,$task)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
           
        ]);

        $tasks=Task::where('id',$task)->first();
        $tasks->update($validatedData);

        return redirect()->route('home')->with('success', 'task item updated successfully.');
    }

    public function destroy($id)
    {
        $task=Task::where('id',$id)->delete();

        return redirect()->route('home')->with('success', 'task item deleted successfully.');
    }

    
  

}