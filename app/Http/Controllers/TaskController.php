<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('isCompleted', false)->orderBy('id', 'DEC')->get();
        $compTasks = Task::where('isCompleted', true)->get();
        return response()->json([
            'tasks' => $tasks,
            'compTasks' => $compTasks
        ]);
        //return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $task = Task::create($request->all());
       return response()->json([
            "code" => 200,
            "message" => "Task added successfully!"
       ]);
       // return response()->json($task, 201);
    }


    //Added new function
    public function complete($id)
    {
        $task = Task::find($id);
        $task->isCompleted = true;
        $task->save();
        return response()->json([
            "code" => 200,
            "message" => "Task listed as completed!"
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Task $task)
    {
        return Task::find($task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //$task = Task::findOrFail($id);
        $task->update($request->all());
    
        return response()->json($task, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task = $task->delete();
        return response()->json([
            "code" => 200,
            "message" => "Task deleted successfully!"
        ]);
        //$task->delete();
        //return response()->json(null, 204);
    }
}
