<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    public $table = 'brands';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function brandApprovedRequests()
    {
        return $this->hasMany(ApprovedRequest::class, 'brand_id', 'id');
    }

    public function brandItems()
    {
        return $this->belongsToMany(Item::class);
    }
}
