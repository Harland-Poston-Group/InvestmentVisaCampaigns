<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multistep_Form_Answer extends Model
{

    protected $table = 'multistep_forms_answers';
    protected $fillable = ['question_id', 'answer_text', 'order'];

    /**
     * Define a relationship to the question.
     */
    public function question()
    {
        return $this->belongsTo(Multisstep_Form_Question::class);
    }
}
