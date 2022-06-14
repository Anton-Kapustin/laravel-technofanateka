<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assemble extends Model
{
  protected $table = ('assemble');
  public $timestamps = false;

  protected $fillable = [
    'cpu_id',
    'ram_id',
    'motherboard_id',
    'cooller_id',
    'ssd_id',
    'hdd_id',
    'power_supply_id',
    'pc_case_id',
    'video_card_id',
    'type',
    'preview_image',
    'price',

  ];

  protected $primaryKey = 'id';
  public $incrementing = true;

  public function cpu()
  {
    return $this->belongsTo('App\Models\Cpu');
  }

  public function motherboard()
  {
    return $this->belongsTo('App\Models\Motherboard');
  }

  public function ram()
  {
    return $this->belongsTo('App\Models\Ram');
  }

  public function ssd()
  {
    return $this->belongsTo('App\Models\Ssd');
  }

  public function hdd()
  {
    return $this->belongsTo('App\Models\Hdd');
  }

  public function video_card()
  {
    return $this->belongsTo('App\Models\VideoCard');
  }

  public function power_supply()
  {
    return $this->belongsTo('App\Models\PowerSupply');
  }

  public function cooller()
  {
    return $this->belongsTo('App\Models\Cooller');
  }

  public function pc_case()
  {
    return $this->belongsTo('App\Models\PcCase');
  }

}