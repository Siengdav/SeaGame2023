<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nameSport',
        'dateStart',
        'timeStart',
        'venue',
    ];
    public static function store($request, $id = null)
    {   
        
        $team = $request->only(
            'user_id',
            'nameSport',
            'dateStart',
            'timeStart',
            'venue',
        );

        $team = self::updateOrCreate(['id' => $id], $team);

        $teams = request('teams');
        $team->teams()->sync($teams);
        
        return $team;


    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }
    public function tickets(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    
}
