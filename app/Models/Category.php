<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    // 1 Category memiliki banyak Event
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}