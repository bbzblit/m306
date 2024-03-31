<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashCard extends Model
{
    use HasFactory, HasUuids;
    
    protected $table = 'flash_cards';

    protected $fillable = [
        "key",
        "value",
        'set_id',
    ];

    public function post(){
        return $this->belongsTo(Set::class);
    }
}