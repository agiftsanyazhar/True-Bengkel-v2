<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Motor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the tipeMotor that owns the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipeMotor(): BelongsTo
    {
        return $this->belongsTo(TipeMotor::class);
    }

    /**
     * Get the brand that owns the Motor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
