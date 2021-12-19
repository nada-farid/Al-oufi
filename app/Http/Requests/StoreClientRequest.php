<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'client_name' => [
                'string',
                'required',
            ],
            'client_no'=>[
               'nullable',
                ],
            'tel_1' => [
                'string',
                'nullable',
            ],
            'tel_2' => [
                'string',
                'nullable',
            ],
            'tax_number' => [
                'string',
                 'nullable',
            ],
            'short_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                 'nullable',
            ],
            'address' => [
                'string',
                  'nullable',
            ],
            'fax' => [
                'string',
                'nullable',
            ],
            'contact_person' => [
                'string',
                 'nullable',
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
               'nullable',
            ],
            'mobile_number_2' => [
                'string',
                'nullable',
            ],
            'from' => [
                  'nullable',
                'date_format:' . config('panel.date_format'),
            ],
            'to' => [
                  'nullable',
                'date_format:' . config('panel.date_format'),
            ],
    
        ];
    }
}
