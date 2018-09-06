<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use App\Group;
use App\FloweringGroup;
use DB;         // Use MYSQL Queries
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Plant::orderBy('created_at', 'desc') -> paginate(10);
        return view('posts.index') -> with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Creating a New Entry";
        return view('posts.createPlant')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this -> validate($request, [
            'sc_name'    => 'required',
            'name'       => 'required',
            'family'     => 'required',
            'other_name' => 'nullable',
            'plant_info' => 'required',
            'plant-group'=> 'required',
            'flowering'  => 'required',
            'credit'     => 'nullable',
            'links'      => 'nullable',
            'plant_image'=> 'image|nullable|max:1999'
        ]);

        // Create Database Entry
        $plant = new Plant;
        $plant -> Scientific_Name = $request -> input('sc_name');
        $plant -> Common_Name     = $request -> input('name');
        $plant -> Family          = $request -> input('family');
        if($request -> input('other_name') != null)
            $plant -> Other_Name  = $request -> input('other_name');

        $plant -> GroupID = $request -> input('plant-group');   
        $plant -> FlowerID = $request -> input('flowering');  

        $plant -> Credit_links     = $request -> input('credit');
        $plant -> Useful_links     = $request -> input('links');
        $plant -> Description     = $request -> input('plant_info');
        $plant -> user_id = auth()->user()->id;
        
        // Handle file upload
        if($request -> hasFile('plant_image')){
            // Get filename with the extension
            $filenameWithExt = $request ->file('plant_image') -> getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request ->file('plant_image') -> getClientOriginalExtension();
            // Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload image
            $path = $request->file('plant_image')->move('images', $fileNameToStore);
            //$path = $request->file('plant_image')->storeAs('public/images',  $fileNameToStore);

        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $plant -> Images = $fileNameToStore;

        $plant -> save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $plant = Plant::find($id);
        return view('posts.show') ->with('plant', $plant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $plant = Plant::find($id);
        return view('posts.edit') ->with('plant', $plant);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
 
        //dd($request -> hasFile('plant_image'));

        $this -> validate($request, [
            'sc_name'    => 'required',
            'name'       => 'required',
            'family'     => 'required',
            'other_name' => 'nullable',
            'plant_info' => 'required',
            'plant-group'=> 'required',
            'flowering'  => 'required',
            'credit'     => 'nullable',
            'links'      => 'nullable',
            'plant_image'=> 'image|nullable|max:1999'
        ]);

        // Refresh Database Entry
        $plant = Plant::find($id);
        $plant -> Scientific_Name = $request -> input('sc_name');
        $plant -> Common_Name     = $request -> input('name');
        $plant -> Family          = $request -> input('family');
        if($request -> input('other_name') != null)
            $plant -> Other_Name  = $request -> input('other_name');

        $plant -> GroupID = $request -> input('plant-group');   
        $plant -> FlowerID = $request -> input('flowering');  

        $plant -> Credit_links     = $request -> input('credit');
        $plant -> Useful_links     = $request -> input('links');
        $plant -> Description     = $request -> input('plant_info');
        $plant -> user_id = auth()->user()->id;
        
        // Handle file upload
        if($request -> hasFile('plant_image')){
            // Get filename with the extension
            $filenameWithExt = $request ->file('plant_image') -> getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request ->file('plant_image') -> getClientOriginalExtension();
            // Filename to Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            // Upload image
            $path = $request->file('plant_image')->move('images', $fileNameToStore);
            //$path = $request->file('plant_image')->storeAs('public/images',  $fileNameToStore);

            // Remove old image and replace with new one 
            // unless image is default image
            if ($plant -> Images != 'noimage.jpg') {
                Storage::delete('images/'.$plant -> Images);
            }
            $plant -> Images = $fileNameToStore;
        }
        
        $plant -> save();

        return redirect('/posts')->with('success', 'Post Updated');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete Plant and Image
        $plant = Plant::find($id);
        $plant -> delete();
        if ($plant -> Images != 'noimage.jpg') {
            Storage::delete('images/'.$plant -> Images);
        }

        return redirect('/posts')->with('success', 'Plant Deleted'); 
    }
}
