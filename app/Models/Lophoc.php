<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lophoc extends Model
{
    use HasFactory;
    protected $table = 'lophoc';
    public function student()
    {
        return $this->belongsToMany(Student::class);
    }
}
