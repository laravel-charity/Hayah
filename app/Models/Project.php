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
