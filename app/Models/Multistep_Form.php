<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Multistep_Form extends Model
{
    protected $table = 'multistep_forms';
    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Define a relationship to questions.
     */
    public function questions()
    {
        // return $this->hasMany(Multistep_Form_Question::class);
        return $this->hasMany(Multistep_Form_Question::class, 'form_id');
    }

    /**
     * Fetch a form with its questions and answers ordered by 'order'.
     *
     * @param string $slug
     * @return Form|null
     */
    public static function fetchWithQuestionsAndAnswers($slug)
    {
        return self::with(['questions' => function ($query) {
            $query->orderBy('order')->with(['answers' => function ($query) {
                $query->orderBy('order');
            }]);
        }])->where('slug', $slug)->first();
    }
}
