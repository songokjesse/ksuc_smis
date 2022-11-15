<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'course_code','program_id'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
