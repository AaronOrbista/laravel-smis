<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApprovedRequest extends Model
{
    use SoftDeletes;

    public $table = 'approved_requests';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'date_requested',
    ];

    protected $fillable = [
        'unit',
        'price',
        'item_id',
        'brand_id',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
        'requestor_id',
        'control_number',
        'description_id',
        'date_requested',
    ];

    public function controlNumberItemReleaseRecords()
    {
        return $this->hasMany(ItemReleaseRecord::class, 'control_number_id', 'id');
    }

    public function dateIssuedItemReleaseRecords()
    {
        return $this->hasMany(ItemReleaseRecord::class, 'date_issued_id', 'id');
    }

    public function requestor()
    {
        return $this->belongsTo(Account::class, 'requestor_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function description()
    {
        return $this->belongsTo(Item::class, 'description_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function getDateRequestedAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateRequestedAttribute($value)
    {
        $this->attributes['date_requested'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
