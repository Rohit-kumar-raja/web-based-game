<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matches;

class Contest extends Model
{
    use HasFactory;

    function matches()
    {
        return $this->belongsTo(Matches::class);
    }
}
