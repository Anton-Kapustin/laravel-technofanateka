<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PowerSupply extends Model
{
  protected $table = 'power_supply';
  public $timestamps = false;

  protected $fillable = [
      'model', 
      'power'
    ];
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'power_supply_id');
  }

  public static function get_name()
  {
    $name = 'Блок питания';
    return $name;
  }

  public static function get_route_for_add()
  {
    return 'admin_add_power_supply_page';
  }
}