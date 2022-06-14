<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelegramLogs extends Model
{
  protected $table = 'telegram_logs';
  public $timestamps = true;

  protected $fillable = [
    'title', 'request', 'text_error'
];
    protected $primaryKey = 'id';
    public $incrementing = true;

}
