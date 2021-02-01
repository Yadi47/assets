<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';

    protected $fillable = ['code ','name','purchase_at','purchase_price','description','status','model','image', 'brand','category_id',
    'type_id','location_id', 'asset_part_of','calibration_name'];
}
