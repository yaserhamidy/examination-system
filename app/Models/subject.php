<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $table = ("sub_classesses");
    protected $primaryKey = 'sub_classesses_id';

    public function results()
    {
        return $this->hasMany(result::class, 'exam_id');
    }
    
    
}
