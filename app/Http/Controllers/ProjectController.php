<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request) {
        $query = Project::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        return response()->json(Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'created_by' => $request->user()->id,
            'status' => 'active'
        ]));
    }

    public function show(Project $project)
    {
        return response()->json($project->load('tasks'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
        ]);

        $project->update($validated);
        return response()->json($project);
    }

    public function updateStatus(Request $request, Project $project)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,archived',
        ]);

        $project->update(['status' => $validated['status']]);
        return response()->json($project);
    }
}
