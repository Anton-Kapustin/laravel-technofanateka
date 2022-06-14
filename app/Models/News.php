<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $table = 'news';
  public $timestamps = true;

  protected $fillable = [
    'title', 'body', 'title_image', 'user_id', 'top_news', 'published', 'description'
];
    protected $primaryKey = 'id';
    public $incrementing = true;

  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

}
