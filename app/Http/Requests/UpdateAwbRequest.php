<?php

namespace App\Http\Requests;

use App\Models\Awb;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAwbRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('awb_edit');
    }

    public function rules()
    {
        return [
            'awb_no' =>  "required|unique:awbs,awb_no,{$this->awb->id},id,deleted_at,NULL",
            'no_of_pcs' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'goods_type' => [
                'string',
                'required',
            ],
            'decleration_no' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'goods_weight' => [
                'numeric',
                'required',
            ],
            'declaration_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'delivery_no' => [
                 'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'delivery_date' => [
        
                'nullable',
            ],
            'delivery_amount' => [
                'nullable',
                
            ],
            'goods_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'customer_fees' => [
            
                'nullable',      
            ],
            'receipt_no' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'receipt_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'serial_number'=>[
                'required',
                ],
        ];
    }
}
