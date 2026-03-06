<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();

    return response()->json([
        'total_active_projects' => Project::where('created_by', $user->id)
                                        ->where('status', 'active')
                                        ->count(),
                                          
        'total_pending_tasks' => Task::where('created_by', $user->id)
                                    ->whereNotIn('category_id', [4])
                                    ->count(),
                                      
        'upcoming_due_tasks' => Task::where('created_by', $user->id)
                                    ->where('due_date', '>=', now())
                                    ->where('due_date', '<=', now()->addDays(3))
                                    ->orderBy('due_date', 'asc')
                                    ->get()
    ]);
    }
}
