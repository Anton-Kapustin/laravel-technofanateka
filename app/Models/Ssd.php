<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ssd extends Model
{
  protected $table = 'ssd';
  public $timestamps = false;

  protected $fillable = [
      'memory_type', 
      'size', 
      'model'
    ];
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'ssd_id');
  }

  public static function get_name()
  {
    $name = 'SSD';
    return $name;
  }

  public static function get_route_for_add()
  {
    return 'admin_add_hdd_page';
  }
}