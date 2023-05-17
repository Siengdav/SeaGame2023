<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
    ];
    public static function store($request, $id = null)
    {   
        
        $team = $request->only(
            'event_id',
        );

        $team = self::updateOrCreate(['id' => $id], $team);
    }
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    
}