<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $fillable = [
    	'student_id','term','math','science','history','total_marks'
    ];

    
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

}
