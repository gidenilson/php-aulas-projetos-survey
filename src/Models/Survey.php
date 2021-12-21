<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{

    protected $fillable = [
        'title',
        'description'
    ];

    protected $with = [
        'options'
    ];

    protected $appends = [
        'voters'
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function getVotersAttribute()
    {
        $emails = [];
        foreach ($this->options as $option) {
            $votes = $option->votes;
            foreach ($votes as $vote){
                $emails[$vote->email] = 1;
            }
            
        }
        return (int) count($emails);
    }
}
