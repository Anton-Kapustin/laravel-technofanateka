<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PcCase extends Model
{
  protected $table = 'pc_case';
  public $timestamps = false;

  protected $fillable = [
    'model', 
    'type'
  ];

  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'pc_case_id');
  }

}