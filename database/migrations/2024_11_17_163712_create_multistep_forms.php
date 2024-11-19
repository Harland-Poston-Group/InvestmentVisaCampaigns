<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        // Forms
        Schema::create('multistep_forms', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->char('name', 255)->nullable();
            $table->char('slug', 255);
            $table->char('description', 255)->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        // Questions
        Schema::create('multistep_forms_questions', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->unsignedBigInteger('form_id')->nullable()->default(null);

            $table->tinyText('question_text', 255);
            $table->boolean('allows_multiple_answers')->default(false);
            $table->integer('order')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Estabilish foreign key between 'form_id' column and the corresponding form
            $table->foreign('form_id')->references('id')->on('multistep_forms');
        });

        // Possible answers/options per question
        Schema::create('multistep_forms_answers', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->unsignedBigInteger('question_id')->nullable()->default(null);

            $table->char('answer_text', 255)->nullable();
            $table->integer('order')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            // Foreign key to the corresponding question
            $table->foreign('question_id')->references('id')->on('multistep_forms_questions');
        });

        // Insert sample data
        DB::table('multistep_forms')->insert([
            'name' => 'Residency by Investment',
            'slug' => 'residency-by-investment',
            'description' => 'A form to gather information about residency goals.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $formId = DB::table('multistep_forms')->where('slug', 'residency-by-investment')->value('id');

        $questions = [
            [
                'question_text' => 'What is your main goal to obtaining your Visa Program?',
                'allows_multiple_answers' => false,
                'order' => 1,
                'answers' => [
                    ['answer_text' => 'Asset portfolio diversification and investing in a stable economy', 'order' => 1],
                    ['answer_text' => 'Permanent Residency by Investment in an EU Country', 'order' => 2],
                    ['answer_text' => 'Securing a financial plan B and a future for you and your family', 'order' => 3],
                    ['answer_text' => 'Freedom of travel and access to the Schengen zone for business purposes', 'order' => 4],
                ],
            ],
            [
                'question_text' => 'How much are you willing to invest?',
                'allows_multiple_answers' => false,
                'order' => 2,
                'answers' => [
                    ['answer_text' => 'Less than €50k', 'order' => 1],
                    ['answer_text' => '€50k - €250k', 'order' => 2],
                    ['answer_text' => '€250k - €500k', 'order' => 3],
                    ['answer_text' => '€500k+', 'order' => 4],
                ],
            ],
            [
                'question_text' => 'What type of Program is most appealing to you?',
                'allows_multiple_answers' => false,
                'order' => 3,
                'answers' => [
                    ['answer_text' => 'Real Estate Investment', 'order' => 1],
                    ['answer_text' => 'Investment Funds', 'order' => 2],
                    ['answer_text' => 'Business Opportunities', 'order' => 3],
                    ['answer_text' => 'Retirement', 'order' => 4],
                ],
            ],
            [
                'question_text' => 'How soon do you plan in acquiring your Visa?',
                'allows_multiple_answers' => false,
                'order' => 4,
                'answers' => [
                    ['answer_text' => 'As soon as possible', 'order' => 1],
                    ['answer_text' => 'Within the next 6 months', 'order' => 2],
                    ['answer_text' => 'Within a year', 'order' => 3],
                    ['answer_text' => 'It can take longer if it\'s the right investment for my needs', 'order' => 4],
                ],
            ],
        ];

        foreach ($questions as $questionData) {
            $questionId = DB::table('multistep_forms_questions')->insertGetId([
                'form_id' => $formId,
                'question_text' => $questionData['question_text'],
                'allows_multiple_answers' => $questionData['allows_multiple_answers'],
                'order' => $questionData['order'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            foreach ($questionData['answers'] as $answer) {
                DB::table('multistep_forms_answers')->insert([
                    'question_id' => $questionId,
                    'answer_text' => $answer['answer_text'],
                    'order' => $answer['order'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multistep_forms_answers');
        Schema::dropIfExists('multistep_forms_questions');
        Schema::dropIfExists('multistep_forms');
    }
};
