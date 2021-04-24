<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Checkin;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCheckinRequest extends FormRequest  {





public function authorize()
{
    abort_if(Gate::denies('checkin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');




return true;
    
}
public function rules()
{
    



return [
'ids' => 'required|array',
    'ids.*' => 'exists:checkins,id',
]
    
}

}