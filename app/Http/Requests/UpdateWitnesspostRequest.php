<?php

namespace App\Http\Requests;

use App\Models\Witnesspost;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateWitnesspostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('witnesspost_edit');
    }

    public function rules()
    {
        return [
            'witness_id' => [
                'required',
                'integer',
            ],
            'event_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
