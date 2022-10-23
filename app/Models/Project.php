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
    use HasFactory ,SoftDeletes;

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'category_id',
    //    'status',
    //    'start_date',
    //     'end_date',
    // ];

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
}
