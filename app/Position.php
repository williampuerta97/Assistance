<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    protected $primaryKey = 'pos_id';
    protected $fillable = ['pos_name'];
    protected $hidden = ['created_at', 'updated_at'];
}
