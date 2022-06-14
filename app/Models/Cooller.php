<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cooller extends Model
{
  protected $table = 'cooller';
  public $timestamps = false;

  protected $fillable = [
      'model', 
      'rpm', 
      'type'
    ];

  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'cooller_id');
  }
  
  public static function get_name()
  {
    $name = 'Охлаждение';
    return $name;
  }

  public static function get_route_for_add()
  {
    return 'admin_add_cooller_page';
  }
}