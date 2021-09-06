<?php

use App\Models\Question;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('type');
            $table->boolean('required');
            $table->json('options')->nullable();
            $table->timestamps();
        });

        $questions = [
            [
                'label' => 'What colour are your toes today?',
                'type' => Question::TYPE_SELECT,
                'required' => false,
                'options' => json_encode([
                    [
                        'label' => 'normal coloured',
                        'value' => 'normal'
                    ],
                    [
                        'label' => 'Orange',
                        'value' => 'orange'
                    ],
                    [
                        'label' => 'Blue',
                        'value' => 'blue'
                    ]
                ])
            ],
            [
                'label' => 'At any point this week, did you experience overwhelming feelings of doom?',
                'type' => Question::TYPE_TEXT,
                'required' => false,
                'options' => null
            ],
            [
                'label' => 'Are you currently alive?',
                'type' => Question::TYPE_BOOLEAN,
                'required' => false,
                'options' => null
            ],
            [
                'label' => 'Was there cake?',
                'type' => Question::TYPE_BOOLEAN,
                'required' => true,
                'options' => null
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
