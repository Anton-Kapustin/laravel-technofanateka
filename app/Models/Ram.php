<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
  protected $table = 'ram';
  public $timestamps = false;

  protected $fillable = [
    'model', 'type_ram', 'size', 'frequency'
    ];
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'ram_id');
  }

  public static function get_name()
  {
    $name = 'ОЗУ';
    return $name;
  }

  public static function get_route_for_add()
  {
    return 'admin_add_ram_page';
  }
}