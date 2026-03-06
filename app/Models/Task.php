<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'project_id',
        'category_id',
        'created_by',
        'deleted_by',
        'title',
        'description',
        'due_date',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function deleter() {
        return $this->belongsTo(User::class, 'deleted_by');
    }
    
}
