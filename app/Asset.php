<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'assets';

    protected $fillable = ['name','purchase_at','purchase_price','description','status','model','image','brand','category_id','asset_part_of','type_id','location_id'];
}
