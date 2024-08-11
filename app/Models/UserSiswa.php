<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSiswa extends Model {
    use HasFactory;

    protected $fillable = [
        'user_id', 'NISN', 'student_card','school_name'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
