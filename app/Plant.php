<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
use App\User;

class Plant extends Model
{
    // https://laracasts.com/discuss/channels/general-discussion/eloquent-select-from-multiple-tables

    // Table Name
    protected $table = 'arboretumplants';

    // Primary Key
    public $primaryKey = 'PlantID';

    // TimeStamps
    public $timestamps = true;

    public function user(){
        return $this -> belongsTo('App\User');
    }

    public function group()
    {
        return $this->hasOne('App\Group', 'GroupID', 'GroupID');

    }

    public function flower_group()
    {
        return $this->hasOne('App\FloweringGroup', 'FlowerGroupID', 'FlowerID');

    }
}
