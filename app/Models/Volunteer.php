<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Volunteer extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->belongsToMany(Project::class)->withPivot('status');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    protected $fillable = [

        'user_id',
        'phone',
        'city',
        'description',


    ];
}
