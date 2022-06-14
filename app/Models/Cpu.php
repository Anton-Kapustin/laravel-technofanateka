<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
  protected $table = 'cpu';
  public $timestamps = false;

  protected $fillable = [
      'model', 
      'family', 
      'socket', 
      'frequency'
    ];
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'cpu_id');
  }

  public static function get_name()
  {
    $name = 'Процессор';
    return $name;
  }
  
  public static function get_route_for_add()
  {
    return 'admin_add_cpu_page';
  }
}