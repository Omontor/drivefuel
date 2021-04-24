<?php

namespace App\Http\Requests;

use App\Models\Trivia;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTriviaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('trivia_edit');
    }

    public function rules()
    {
        return [
            'questionarie_id' => [
                'required',
                'integer',
            ],
            'content' => [
                'string',
                'required',
            ],
        ];
    }
}
