<?php

namespace App\Http\Requests;

use App\Models\Questionarie;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuestionarieRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('questionarie_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'project_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
