<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Plant;

class Group extends Model
{
    //
    protected $table = 'plantgroup';

    // Primary Key
    public $primaryKey = 'GroupID';

    public function plants()
    {
        return $this -> hasMany('App\Plant', 'GroupID', 'GroupID');
    }


}
