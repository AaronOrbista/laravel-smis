<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    public $table = 'items';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ITEM_CATEGORY_SELECT = [
        '1' => 'School Supply',
        '2' => 'Cleaning Supply',
    ];

    protected $fillable = [
        'name',
        'stock',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'item_category',
    ];

    public function itemApprovedRequests()
    {
        return $this->hasMany(ApprovedRequest::class, 'item_id', 'id');
    }

    public function descriptionApprovedRequests()
    {
        return $this->hasMany(ApprovedRequest::class, 'description_id', 'id');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
    }
}
