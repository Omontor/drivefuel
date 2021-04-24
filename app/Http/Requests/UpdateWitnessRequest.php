<?php

namespace App\Http\Requests;

use App\Models\Witness;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWitnessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('witness_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
        ];
    }
}
