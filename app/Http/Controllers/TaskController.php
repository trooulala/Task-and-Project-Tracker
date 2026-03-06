<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function index(Request $request) {
        $query = Task::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('project_id')) {
            $query->where('project_id', $request->project_id);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        return response()->json(Task::create([
            'project_id' => $validated['project_id'],
            'category_id' => $validated['category_id'],
            'created_by' => $request->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
        ]));
    }

    public function show(Task $task)
    {
        return response()->json($task);
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'project_id' => 'sometimes|required|exists:projects,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'due_date' => 'sometimes|required|date',
        ]);

        $task->update($validated);
        return response()->json($task);
    }

    public function destroy(Request $request, Task $task)
    {
        $task->update(['deleted_by' => $request->user()->id]);
        $task->delete();
        return response()->json(['message' => 'Task deleted']);
    }
    
}
