<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    //we can add attributes such duration, start_date, end_date, etc
    //to the enrollment table
    protected $fillable = ['user_id', 'course_id'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
