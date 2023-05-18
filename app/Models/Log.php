<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public $timestamps = false;

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id');
    }
}
