<?php

namespace App\Http\Requests;

use App\Models\Awb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAwbRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('awb_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:awbs,id',
        ];
    }
}
