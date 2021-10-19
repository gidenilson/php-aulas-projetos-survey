<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Vote extends Model
{

    protected $filable = ['option_id', 'email', 'verified'];

    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
