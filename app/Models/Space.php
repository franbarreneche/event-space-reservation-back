<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Space extends Model
{
    /** @use HasFactory<\Database\Factories\SpaceFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $attributes = [
        'images' => '[]',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
        ];
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
