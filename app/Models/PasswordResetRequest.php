<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordResetRequest extends Model
{
    use HasFactory, HasUuids, SoftDeletes; # Because incremented IDs suck

    protected $table = 'password_reset_requests';

    protected $fillable = [
        "user_id",
        "code"
    ];

    protected $hidden = [
        "last_login_at",
        "created_at",
        "updated_at",
        "deleted_at",
        "remember_token"
    ];

    public function pwResetRequests(): BelongsTo
    {
        return $this->belongsTo(PasswordResetRequest::class);
    }
}
