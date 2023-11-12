<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SparePart extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the brand that owns the SparePart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the tipeMotor that owns the SparePart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipeMotor(): BelongsTo
    {
        return $this->belongsTo(TipeMotor::class);
    }

    /**
     * Get all of the orderDetail for the SparePart
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetail(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
