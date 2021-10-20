<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Survey extends Model
{

    protected $fillable = ['title', 'description'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}