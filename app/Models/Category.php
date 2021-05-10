<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * カテゴリが持つ課題を取得
     */
    public function problems() {
        return $this->hasMany(Problem::class);
    }
}
