<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index()
    {
        return response()->customJson(
            ['tasks' => TaskResource::collection(Task::all())],
            'Tasks list',
            200
        );
    }

    public function store(StoreTaskRequest $request)
    {
        return response()->customJson(
            ['task' => Task::create($request->validated())],
            'Task create successfully',
            200
        );
    }

    public function show(Task $task)
    {
        return response()->customJson(
            ['task' => TaskResource::make($task)],
            'Show task',
            200
        );
    }

    public function update(UpdateTaskRequest $request, Task $task): TaskResource
    {
        $task->update($request->validated());
        return TaskResource::make($task);
    }

    public function destroy(Task $task): Response
    {
        $task->delete();
        return response()->noContent();
    }
}
