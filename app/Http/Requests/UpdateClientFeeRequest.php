<?php

namespace App\Http\Requests;

use App\Models\ClientFee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientFeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_fee_edit');
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
