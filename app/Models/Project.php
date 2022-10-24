<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Donation;
use App\Models\Volunteer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'category_id',
    //    'status',
    //    'start_date',
    //     'end_date',
    // ];

    // Database Relationships
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function volunteers()
    {
        return $this->belongsToMany(Volunteer::class)->withPivot('status');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Filter By Status
    public function scopeFilter($query, array $filters)
    {
        // if ($filters['status'] ?? false) {
        //     $query->where('status', 'like', '%' . request('status') . '%');
        // }
        if ($filters["search"] ?? false) {

            $category = Category::where("name", "like", '%' .  $filters["search"] . '%')->first();

            if ($filters['search'] ?? false) {
                self::where(function () use ($query, $filters, $category) {
                    $query->where('name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('status', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('starting_date', 'like', '%' . $filters['search'] . '%')
                        ->orWhere("category_id", "=", $category?->id)
                        ->orWhere('status', 'like', '%' . $filters['search'] . '%');
                });
            }
        }
    }
}
