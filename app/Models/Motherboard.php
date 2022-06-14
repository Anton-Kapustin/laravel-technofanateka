<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motherboard extends Model
{
  
  protected $table = 'motherboard';
  public $timestamps = false;

  protected $fillable = [
      'model', 
      'support', 
      'type_ram', 
      'ram_frequency'
    ];
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'motherboard_id');
  }

  public static function get_name()
  {
    $name = 'Материнка';
    return $name;
  }

  public static function get_route_for_add()
  {
    return 'admin_add_motherboard_page';
  }

}