<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_create');
    }

    public function rules()
    {
        return [
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'end' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'route_id' => [
                'required',
                'integer',
            ],
            'users.*' => [
                'integer',
            ],
            'users' => [
                'required',
                'array',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
