<?php

namespace App;
use App\User;
use App\Cart;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
}
