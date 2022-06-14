<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoCard extends Model
{
  protected $table = 'video_card';
  public $timestamps = false;

  protected $fillable = [
    'model',
    'size', 
    'fps'
  ];
  protected $primaryKey = 'id';
  public $incrementing = true;

  public function assemble()
  {
    return $this->hasMany(Assemble::class, 'video_id');
  }

}