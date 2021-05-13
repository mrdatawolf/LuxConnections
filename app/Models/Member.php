<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Member
 *
 * @package App\Models
 */
class Member extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'members';
    protected $fillable = ['name', 'user_id', 'linked_id'];


    public function heardFrom(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeardFrom::class);
    }

    public function reachedOut(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReachedOut::class);
    }

    public function isStaff(): bool
    {
        return ! empty($this->user_id);
    }

    public function hasLinkedStaff(): bool
    {
        return ! empty($this->linked_id);
    }

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'linked_id');
    }

    public function alias(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
