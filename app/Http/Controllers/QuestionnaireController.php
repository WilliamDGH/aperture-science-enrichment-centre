<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\QuestionnaireResult;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class QuestionnaireController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $questions = Question::all();

        foreach ($questions as $question) {
            $question->options = json_decode($question->options);
        }
        return view('questionnaires', ['questions' => $questions]);
    }

    /**
     * Handle an incoming registration request.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $data['user_id'] = $user->id;
        $data['entry'] = json_encode($data['entry']);

        QuestionnaireResult::create($data);

        return ['redirect' => route('dashboard')];
    }
}
