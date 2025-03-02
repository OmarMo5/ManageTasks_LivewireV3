<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Enums\StatusType;
use App\Enums\PriorityType;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'priority',
        'description',
        'deadline',
    ];

    protected $casts = [
        'deadline' => 'date',
        'priority' => PriorityType::class,
        'status' => StatusType::class,
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
