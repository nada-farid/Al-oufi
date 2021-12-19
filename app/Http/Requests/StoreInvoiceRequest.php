<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_create');
    }

    public function rules()
    {
        return [
            'awb_id' => [
                'required',
                'integer',
            ],
            'goods_release' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'invoice_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'client_id' => [
                'required',
                'integer',
            ],
            
            
            'remarks' => [
                'required',
            ],
            'air'=>[
               'nullable',
                ],
                  'legalization'=>[
               'nullable',
                ],
                  'formalities'=>[
               'nullable',
                ],
                  'demuerrage'=>[
               'nullable',
                ],
                  'scan'=>[
               'nullable',
                ],
                  'undertaking'=>[
               'nullable',
                ],
                  'other'=>[
               'nullable',
                ],
        ];
    }
}
