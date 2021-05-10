<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    /**
     * 課題に対する対策を取得
     */
    public function step() {
        return $this->hasOne(Step::class);
    }
}
