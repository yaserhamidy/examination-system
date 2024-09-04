<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class result extends Model
{
    use HasFactory;
    protected $table = ("results");
    protected $primaryKey = 'result_id';
    
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id'); // Ensure this matches the correct foreign key
    }
    
    public function exam()
    {
        return $this->belongsTo(subject::class, 'exam_id'); // Ensure this matches the correct foreign key
    }
}   
