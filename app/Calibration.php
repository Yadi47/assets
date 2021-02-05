<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calibration extends Model
{
    protected $table = 'calibrations';
    public function assets()
    {
        return $this->belongsTo(Assets::class);
    }
}
