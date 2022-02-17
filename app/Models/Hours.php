<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->hasOne('User', 'id', 'user_id');
    }
}
