<?php

namespace App\Models;

use App\Models\User;
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeProject($query, array $filters)
    {
        if ($filters["search"] ?? false) {
            $project = Project::where("name", "LIKE", "%" . $filters["search"] . "%")->first();
            $query->where("project_id", "=", $project?->id)
                ->orWhere("name", "LIKE", "%" . $filters["search"] . "%")
                ->orWhere("email", "LIKE", "%" . $filters["search"] . "%");
        }
    }
    protected $fillable = ['amount', 'project_id', 'name', 'email'];
}
