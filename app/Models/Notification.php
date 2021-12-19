<?php

namespace App\Models;


use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Notification extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public const APPEARANCE_SELECT = [
        'yes' => 'Yes',
        'No'  => 'No',
    ];

    public $table = 'notifications';

    protected $appends = [
        'awb_file',
    ];

    protected $dates = [
        'awb_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'awb_no',
        'client_id',
        'awb_date',
        'remarks',
        'appearance',
         'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getAwbDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAwbDateAttribute($value)
    {
        $this->attributes['awb_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

  public function getAwbFileAttribute()
    {
        return $this->getMedia('awb_file');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
