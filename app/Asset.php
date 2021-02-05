<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';
    protected $fillable = [
        'code',
        'name',
        'purchase_at',
        'purchase_price',
        'description',
        'status',
        'model',
        'image',
        'brand',
        'category_id',
        'type_id',
        'location_id',
        'asset_part_of',
    ];

<<<<<<< HEAD
    protected $fillable = ['name','purchase_at','purchase_price','description','status','model','image','brand','category_id','asset_part_of','type_id','location_id'];
=======
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class,'asset_part_of');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class,'asset_part_of');
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function assetCalibrations()
    {
        return $this->hasMany(Calibration::class, 'asset_id');
    }
>>>>>>> 99c9e035bd4a63e13665a4a746e37facfce15365
}
