<?php

namespace App\Http\Requests;

use App\Models\Checkin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCheckinRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('checkin_edit');
    }

    public function rules()
    {
        return [
            'datetime' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
            'lat' => [
                'string',
                'required',
            ],
            'lng' => [
                'string',
                'required',
            ],
        ];
    }
}
