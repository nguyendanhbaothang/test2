<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    public function lophoc()
    {
        return $this->belongsToMany(Lophoc::class, 'student_class', 'student_id', 'lophoc_id');
    }
}
