<?php

namespace App\Http\Requests;

use App\Models\Notification;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNotificationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('notification_create');
    }

    public function rules()
    {
        return [
            'awb_no' => [
                'string',
                'required',
                 'unique:notifications',
            ],
            'client_id' => [
                'nullable',
                'integer',
            ],
            'awb_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'appearance' => [
                'required',
            ],
        ];
    }
}
