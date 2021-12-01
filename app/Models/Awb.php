<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Awb extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $table = 'awbs';

    protected $appends = [
        'declaration_file',
    ];

    protected $dates = [
        'declaration_date',
        'delivery_date',
        'goods_date',
        'receipt_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'awb_no',
        'no_of_pcs',
        'goods_type',
        'decleration_no',
        'goods_weight',
        'declaration_date',
        'delivery_no',
        'delivery_date',
        'delivery_amount',
        'goods_date',
        'customer_fees',
        'receipt_no',
        'receipt_date',
        'remarks',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getDeclarationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeclarationDateAttribute($value)
    {
        $this->attributes['declaration_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDeclarationFileAttribute()
    {
        return $this->getMedia('declaration_file')->last();
    }

    public function getDeliveryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeliveryDateAttribute($value)
    {
        $this->attributes['delivery_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getGoodsDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setGoodsDateAttribute($value)
    {
        $this->attributes['goods_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReceiptDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setReceiptDateAttribute($value)
    {
        $this->attributes['receipt_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
