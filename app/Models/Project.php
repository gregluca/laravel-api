<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','project_date', 'slug','type_id'];

    // public function setTitleAttribute($_title) {
    //     $this->attributes['title'] = $_title;
    //     $this->attributes['slug'] = Str::slug($_title);
    // }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }

}
