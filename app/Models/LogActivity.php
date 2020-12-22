<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Jamesh\Uuid\HasUuid;

class LogActivity extends Model
{
    use HasUuid;
    
    protected $table='log_activity';
    protected $keyType = 'string';
    protected $guarded = ['id'];
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }
}
