<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorizedValue extends Model
{
    use HasFactory;

    protected $table = 'categorized_values';

    protected $fillable = [
        'user_id',
        'meanF0',
        'F0std',
        'meanF1',
        'H1minusA3',
        'pauseCount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}