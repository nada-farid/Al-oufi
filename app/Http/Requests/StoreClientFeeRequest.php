<?php

namespace App\Http\Requests;

use App\Models\ClientFee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientFeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_fee_create');
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
