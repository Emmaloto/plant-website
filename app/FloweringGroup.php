<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FloweringGroup extends Model
{
    //
    protected $table = 'flower_group';

    public $primaryKey = 'FlowerGroupID';


      public function plants()
      {
          return $this -> hasMany('App\Plant', 'FlowerID', 'FlowerGroupID');
      }  
}
