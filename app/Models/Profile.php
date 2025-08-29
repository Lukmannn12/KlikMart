<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'date_of_birth',
        'name',
        'address',
        'phone_number',
        'image',
        'gender'
        // tambahkan field lain sesuai kebutuhan
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
