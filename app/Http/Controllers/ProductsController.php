<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product ; 
use App\Category ;
use Session ;  
use File ; 

class ProductsController extends Controller
{
    public function index(Category $category)
    {
    	if($category->exists){

    		$products = $category->products()->latest(); 

    	}else{

    		$products= Product::latest();
    	}

    	$products = $products->get();
        
        
        return view('shop.index',compact(['products','category']));
    }

    public function manage(Category $category){

      if($category->exists){


        $products = $category->products()->latest() ; 
      }else{

        $products = Product::latest();

      }

        $products = $products->get();

        return view('admin.dashboard.products.index',compact('products','category'));
    }


    public function create(){


        $categories = Category::all(); 



        return view('admin.dashboard.products.create');


    }


    public function show(Category $category,Product $product){



       return view('shop.show',compact(['category','product']));
    }

    public function store(Request $request){

           //validation 
            $this->validate($request,[
                'title' => 'required|max:300',
                'description' => 'min:50',
                'category' => 'required|exists:categories,id',
                'price' => 'required|regex:/^\d*(\.\d{1,2})?$/',
                'cover' => 'required|image'               
            ]);
            

            //Gete The category name 


            $category_slug = Category::find($request->category)->slug ; 




            //get The File name with Extension 

            $fileNameWithExt = $request->file('cover')->getClientOriginalName();


            


            //get file name witthout extension 
            $fileNameWithoutExt = pathinfo($fileNameWithExt,PATHINFO_FILENAME); 

           


            //Get The Extension 
            $extension = $request->file('cover')->getClientOriginalExtension();


            


            //create new unique file name name 

            $newFileName = $fileNameWithoutExt . '_' . time() . '.' . $extension ; 

            

            //uplaod the Image to the database 

           // dd(public_path());

          //dd(base_path('public\categories'));


          $path = base_path('public\imgs\categories\\') . $category_slug ;


          $request->cover->move($path,$newFileName);


          $image_url = asset('imgs/categories/'.$category_slug.'/' . $newFileName );


          //dd($image_url);
          //dd($image_url);  
           //dd($path);



           //create new Product 
           

           $product = new Product ;

           $product->title = $request->title ; 

           $product->description = $request->description ; 

           $product->category_id = $request->category ; 

           //store the price after converting it to float
           $product->price = floatval($request->price) ; 

           $product->cover = $image_url ; 

           $product->save();

          // dd($product);

           Session::flash('success','Product Created Succefully');


           return redirect()->route('admin.products.index');

            

    }

    //Edit a product 

    public function edit(Product $product){

        $categories = Category::all();
        return view('admin.dashboard.products.edit',compact('product','categories')) ; 


    }

    //Update product 
    public function update(Request $request,Product $product){

        //validation 
            $this->validate($request,[
                'title' => 'required|max:300',
                'description' => 'min:50',
                'category' => 'required|exists:categories,id',
                'price' => 'required|regex:/^\d*(\.\d{1,2})?$/'            
            ]);


            if($request->hasFile('cover')){

              $this->validate($request,[
                  'cover' => 'image'

              ]) ; 


              //delete the old Image 
              $url = $product->cover ; 

              $parts = explode('/',$url);

              $image_path_array = array_slice($parts,3);

              $image_path = implode('/',$image_path_array);

              //delete the file form the public path 
              File::delete($image_path);


              //build new Image 
              $category_slug = Category::find($request->category)->slug ;

            //get The File name with Extension 

            $fileNameWithExt = $request->file('cover')->getClientOriginalName();     

            //get file name witthout extension 
            $fileNameWithoutExt = pathinfo($fileNameWithExt,PATHINFO_FILENAME); 

            //Get The Extension 
            $extension = $request->file('cover')->getClientOriginalExtension();


            //create new unique file name  

            $newFileName = $fileNameWithoutExt . '_' . time() . '.' . $extension ; 

          
            //uplaod the Image to the database 

          $path = base_path('public\imgs\categories\\') . $category_slug ;

          $request->cover->move($path,$newFileName);

          $image_url = asset('imgs/categories/'.$category_slug.'/' . $newFileName );


              //save it to the product 
              $product->cover = $image_url ; 
            }


            //save title 


            $product->title = $request->title ;  


            //save description 

            $product->description = $request->description ; 


            //save price 

            $product->price = floatval($request->price); 


            //save category_id 

            $product->category_id = $request->category ;  


            //update the Product 

            $product->save();

            //Flash session message 

            Session::flash('success','Product Updated Successfully');


            //redirect to index page 

            return redirect()->route('admin.products.index');




    }



    //Delete Product


    public function destroy(Product $product){

        //dd($product->cover);
        $url = $product->cover ; 

        $parts = explode('/',$url);

        $image_path_array = array_slice($parts,3);

        $image_path = implode('/',$image_path_array);

        

        //delete the file form the public path 
        File::delete($image_path);

   
      

      
      Product::destroy($product->id); 


     // Session::flash('success','Product Deleted Succesfully');


      return redirect()->back();


    }
}
