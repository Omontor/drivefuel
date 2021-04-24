<?php

namespace App\Http\Requests;

use App\Models\Witness;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreWitnessRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('witness_create');
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
