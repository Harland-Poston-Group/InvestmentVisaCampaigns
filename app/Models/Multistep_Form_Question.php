<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multistep_Form_Question extends Model
{
    protected $table = 'multistep_forms_questions';
    protected $fillable = ['form_id', 'question_text', 'allows_multiple_answers', 'order'];

    /**
     * Define a relationship to the form.
     */
    public function form()
    {
        // return $this->belongsTo(Multistep_Form::class);
        return $this->belongsTo(Multistep_Form::class, 'form_id');
    }

    /**
     * Define a relationship to answers.
     */
    public function answers()
    {
        // return $this->hasMany(Multistep_Form::class);
        return $this->hasMany(Multistep_Form_Answer::class, 'question_id');
    }
}

