<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participated_user extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(AllUsers::class);
    }

    public function matche()
    {
        return $this->belongsTo(Matches::class);
    }
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    public function contest()
    {
        return $this->belongsTo(Contest::class);
    }
}
