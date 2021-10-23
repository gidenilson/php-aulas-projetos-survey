<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{

    protected $fillable = [
        'survey_id',
        'text',
        'email'
    ];

    protected $appends = [
        'votes'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function getVotesAttribute()
    {
        return $this->votes()->count();
    }
}