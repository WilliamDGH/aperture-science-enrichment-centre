<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    const TYPE_SELECT = 1;
    const TYPE_TEXT = 2;
    const TYPE_BOOLEAN = 3;

    public $table = 'questions';

    protected $fillable = [
        'label',
        'type',
        'required',
        'options'
    ];

}
