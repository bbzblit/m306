<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'sets';

    protected $fillable = [
        "title",
        "description",
        "user_id"
    ];

    public function post(){
        return $this->belongsTo(User::class);
    }

    public function cards(){
        return $this->hasMany(FlashCard::class);
    }
}
