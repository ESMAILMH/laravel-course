<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRquest;
use App\Http\Requests\updateTaskRquest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //CRUD
    public function index()
    {
        $task = Task::all();
        return response()->json($task);
    }
    public function store(StoreTaskRquest $request)
    {

        $task = Task::create($request->validated());
        return response()->json($task, 201);
    }
    public function update(updateTaskRquest $request, $id) // update task
    {
        $task = Task::findOrFail($id);
        $task->update($request->validated());
        return response()->json($task, 200);
    }
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
    public function show($id) 
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }
}
