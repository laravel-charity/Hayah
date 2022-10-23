<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeProject($query, array $filters)
    {
        if ($filters["search"] ?? false) {
            $project = Project::where("name", "LIKE", "%" . $filters["search"] . "%")->first();
            // dd($project);
            $query->where("project_id", "=", $project->id);
        }
    }
}
