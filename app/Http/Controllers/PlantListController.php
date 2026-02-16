<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use App\Group;
use App\FloweringGroup;
use DB;         // Use MYSQL Queries

class PlantListController extends Controller
{

    public function categories(){
        $title = "Plants by Groups";
        return view('posts.categories')->with('title', $title);
    }


    public function loadPlantList($category){
        $plants = null;

        // For the main groups
        if($category == 'mosses'){
            $plants = Group::where('GroupName', 'Mosses and Liverworts') -> first() -> plants;
        }
        else if($category == 'ferns'){
            $plants = Group::where('GroupName', 'Ferns') -> first() -> plants;
        }
        else if($category == 'gymno'){
            $plants = Group::where('GroupName', 'Gymnosperms') -> first() -> plants;
        }
        else if($category == 'angio'){
            $plants = Group::where('GroupName', 'Angiosperms') -> first() -> plants;
        }

        // For flower grouping
        else if($category == 'monocots'){
            $plants = FloweringGroup::where('FlowerGroupName', 'Monocotyledons') -> first() -> plants;
        }
        else if($category == 'dicots'){
            $plants = FloweringGroup::where('FlowerGroupName', 'Dicotyledons') -> first() -> plants;
        }
        else if($category == 'noflower'){
            $plants = FloweringGroup::where('FlowerGroupName', 'Non-Flowering') -> first() -> plants;
        }

        return view('posts.plantlist')->with('posts', $plants);

    }
}
