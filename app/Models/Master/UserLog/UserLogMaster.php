<?php

namespace App\Models\Master\UserLog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLogMaster extends Model
{
    use HasFactory;
    protected $table = 'user_log_masters';
    protected $fillable = ['user_id,viewed_user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
    public function UserInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function ViewedUserInfo()
    {
        return $this->hasOne(User::class, 'id', 'viewed_user_id ');
    }
}
