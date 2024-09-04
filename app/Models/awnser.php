<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class awnser extends Model
{
   
    protected $table = 'answers';
    protected $primaryKey = 'answer_id';

    protected $fillable = [
        'question_id',
        // 'id',
        'choiceanswer',
        'correctanswer',
        'statusanswer',
        'statusexam',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function question()
    {
        return $this->belongsTo(question::class, 'question_id');
    }
}
