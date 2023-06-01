<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public $table= "report";
    public $timestamps= false;
    public function user()
    {
        return $this->hasOne('App\Models\User', "id",'user_id');
    }

}
