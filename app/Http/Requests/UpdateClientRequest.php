<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'client_name' => [
                'string',
                'required',
            ],
            'tel_1' => [
                'string',
                'required',
            ],
            'tel_2' => [
                'string',
                'nullable',
            ],
            'tax_number' => [
                'string',
                'required',
            ],
            'short_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'fax' => [
                'string',
                'nullable',
            ],
            'contact_person' => [
                'string',
                'required',
            ],
            'contact_person_2' => [
                'string',
                'nullable',
            ],
            'bank_name' => [
                'string',
                'nullable',
            ],
            'home_tel' => [
                'string',
                'nullable',
            ],
            'iban' => [
                'string',
                'nullable',
            ],
            'mobile_number_1' => [
                'string',
                'required',
            ],
            'mobile_number_2' => [
                'string',
                'nullable',
            ],
            'from' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'to' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
    
        ];
    }
}
