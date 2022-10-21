<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Donation;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    // Database Relationships
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Filter By Status
    public function scopeFilter($query, array $filters)
    {
        if ($filters['status'] ?? false) {
            $query->where('status', 'like', '%' . request('status') . '%');
        }

        $category = Category::where("name", "like", '%' .  request("search") . '%')->first();

        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('status', 'like', '%' . request('search') . '%')
                ->orWhere('starting_date', 'like', '%' . request('search') . '%')
                ->orWhere("category_id", "=", $category?->id);
        }
    }
}