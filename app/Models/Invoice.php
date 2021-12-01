<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    public $table = 'invoices';

    protected $dates = [
        'goods_release',
        'invoice_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'awb_id',
        'goods_release',
        'invoice_date',
        'client_id',
        'amount',
        'vat',
        'total',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function awb()
    {
        return $this->belongsTo(Awb::class, 'awb_id');
    }

    public function getGoodsReleaseAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setGoodsReleaseAttribute($value)
    {
        $this->attributes['goods_release'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getInvoiceDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInvoiceDateAttribute($value)
    {
        $this->attributes['invoice_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
