<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(5);
        return view('management.menu')->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('management.createMenu')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:menus|max:255',
            'price'=> 'required|numeric',
            'category_id' => 'required|numeric'
        ]);

        $imageName = "noImage.png";

        if($request->image){
            // We validate the image
            $request->validate([
                'image'=> 'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);

            $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('menu_images'), $imageName);
        }

        $menu= new Menu();
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->category_id = $request->category_id;
        $menu->image = $imageName;
        $menu->price = $request->price;

        $menu->save();
        $request->session()->flash('status', $request->name ." is saved successfully");
        return(redirect('management/menu'));

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $categories= Category::all();
        return view('management.editMenu')->with('categories', $categories)->with('menu', $menu);
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
        $request->validate([
            'name'=> 'required|max:250',
            'category_id' => 'required|numeric',
            'price'=> 'required|numeric'
        ]);
        
        // The id is coming from the action link in the form
        $menu = Menu::find($id);

        if($request->image){
            // We validate the image
            $request->validate([
                'image'=> 'nullable|file|image|mimes:jpeg,png,jpg|max:5000'
            ]);

            if($menu->image != 'noImage.png') {
                $imageName = $menu->image;
                // To delete oldd image from menu_images folder
                unlink(public_path('menu_images'.'/'.$imageName));
            }

            $imageName = date('mdYHis').uniqid().'.'.$request->image->extension();
            $request->image->move(public_path('menu_images'), $imageName);
        } else {
            $imageName = $menu->image;
        }

        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->category_id = $request->category_id;
        $menu->image = $imageName;
        $menu->price = $request->price;

        $menu->save();
        $request->session()->flash('status', $request->name ." was updated successfully");
        return(redirect('management/menu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
