<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['word', 'example'];

    /**
     * Return Polish translation
     *
     * @return HasOne
     */
    public function PolishTranslation(): HasOne
    {
        return $this->hasOne(PolishTranslation::class);
    }
}
