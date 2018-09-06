<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use App\Group;
use App\FloweringGroup;
use DB;         // Use MYSQL Queries


class PagesController extends Controller
{
    public function index(){
        $title = "My Arboretum Project (very BETA)";
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = "What is this website about?";
        return view('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services!',
            'services' => ['Web Design', 'Programming', 'Graphic Design']
        );
        return view('pages.services') ->with($data);
    }

    public function create(){
        $title = "Creating a New Plant Entry";
        return view('posts.createPlant')->with('title', $title);
    }

    public function show(){
       $post = Plant::first();

       //$groups = \App\Group::with('plants')->find(1);
       //$groups = \App\Group::all();
       //echo $groups;
       //$post = array(  );
        return view('showTest') ->with('post', $post);
    }


    
    public function store(Request $request){
        
        $this -> validate($request, [
            'sc_name' => 'required',
            'name' => 'required',
            'family' => 'required',
            'other_name' => 'required',
            'plant_info' => 'required'
        ]);

        return 123;
    }


}
