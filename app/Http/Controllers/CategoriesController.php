<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use Illuminate\Http\Request;
use File ; 

class CategoriesController extends Controller
{
   
    public function index()
    {
        return view('admin.dashboard.categories.index')->with('categories',Category::all());
    }

    
    public function create()
    {
        return view('admin.dashboard.categories.create');
    }

    public function show(Category $category){

        $products =  $category->products ; 
       

        return view('categories.show',compact(['products','category']));
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        
        $category = new category;

        $category->name = $request->name;

        $category->slug = str_slug($category->name);

        $category->save();

        Session::flash('success','You succesfully created a category.');

        return redirect()->route('admin.categories.index');

    }

   
    
    
    public function edit(Category $category)
    {

        //$category =Category::find($id);


        return view('admin.dashboard.categories.edit')->with('category',$category);


    }

    
    public function update(Category $category)
    {
        //$category = Category::find($id);

        $category->name = request()->name;

        $category->save();

        Session::flash('success','you succesfully updated the category.');
       
        return redirect()->route('admin.categories.index');
    }   


    
    public function destroy(Category $category)
    {
       

        //delete the folder of the Category 

        File::deleteDirectory('imgs\categories\\' . $category->slug);

         

        //delete all related products
        $category->products()->delete();

        //delete the category
        $category->delete();
    
       

        return redirect()->route('admin.categories.index');

    }
}
