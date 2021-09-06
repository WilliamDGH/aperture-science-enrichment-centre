<?php

namespace App\Http\Controllers;

use App\Models\QuestionnaireResult;
use Illuminate\Support\Facades\Auth;

class QuestionnaireResultController extends Controller
{
    /**
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin) {
            $results = QuestionnaireResult::with('user')->get();
        } else {
            $results = QuestionnaireResult::with('user')->where('user_id', $user->id)->get();
        }

        foreach ($results as $result) {
            $result->entry = json_decode($result->entry);
        }
        return view('results', ['results' => $results]);
    }

}
