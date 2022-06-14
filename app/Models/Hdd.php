<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hdd extends Model
{
    protected $table = 'hdd';
    protected $fillable = [
            'size',
            'form_factor',
            'model'
        ];

    public $timestamps = false;

    protected $primaryKey = 'id';
    public $incrementing = true;

    public function assemble()
    {
        return $this->hasMany(Assemble::class, 'hdd_id');
    }
}
