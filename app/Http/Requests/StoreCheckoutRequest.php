<?php

namespace App\Http\Requests;

use App\Models\Checkout;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCheckoutRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('checkout_create');
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
