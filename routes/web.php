<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[

    'uses' => 'ProductsController@index',
    'as' => 'products.index'
]);

//User and Auth Routes

Route::get('/login',[

    'uses' => 'SessionsController@create', 
    'as' => 'login'
]);


Route::get('/register',[
    'uses' => 'UsersController@create', 

    'as' => 'register'


]);

Route::post('/register',[
    'uses' => 'UsersController@store', 
    'as' => 'user.store'

]);

Route::post('/login',[
    'uses' => 'SessionsController@store',
    'as' => 'session.store'

]);

Route::post('/logout',[

    'uses' => 'SessionsController@destroy',
    'as' => 'session.destroy'
]);

Route::get('/user/{user}',[
    'uses' => 'UsersController@show',
    'as' => 'user.profile'


]);

///categories

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
{
    Route::get('dashboard',function(){

        $orders = \App\Order::all();

           $orders->transform(function($order,$key)
            {
         $order->cart =unserialize($order->cart);
        return $order;
         });

        return view('admin.dashboard',compact('orders'));

    })->name('admin.dashboard');

      route::get('/dashboard/categories',[
        'uses'=> 'CategoriesController@index',
        'as' => 'admin.categories.index'
    ]);


      
    Route::get('/dashboard/products',[
        'uses'=> 'ProductsController@manage',
        'as' => 'admin.products.index'
    ]);

      
    route::get('dashboard/category/create',[
        'uses'=> 'CategoriesController@create',
        'as' => 'admin.category.create'
    ]);
  
    route::post('dashboard/categories/store',[
        'uses'=>'CategoriesController@store',
        'as'=>'admin.category.store'
    ]);


    Route::get('dashboard/categories/delete/{category}',[
        'uses'=>'CategoriesController@destroy',
        'as'=>'admin.category.delete'
    ]);
    
    route::get('dashboard/category/edit/{category}',[
        'uses'=>"CategoriesController@edit",
        'as'=>'admin.category.edit'
    ]);

    
    Route::put('dashboard/category/update/{category}',[
        'uses'=>'CategoriesController@update',
        'as'=>'admin.category.update'
    ]);


     Route::get('/dashboard/categories/{category}',[
        'uses' => 'ProductsController@manage',
        'as' => 'admin.category.show'

      ]);

    Route::get('dashboard/product/create',[
        'uses' => 'ProductsController@create',
        'as' => 'admin.product.create'

    ]); 


    Route::post('dashaboard/products',[
        'uses' => 'ProductsController@store',
        'as' => 'admin.product.store'
    ]);
    

    //delete A product 
    Route::get('dashboard/products/delete/{product}',[
        'uses' => 'ProductsController@destroy',
        'as' => 'admin.product.delete'

    ]);

    //edit A Product 

    Route::get('dashboard/products/edit/{product}',[

        'uses' => 'ProductsController@edit',
        'as' => 'admin.product.edit'

    ]);

    //Update A product
    Route::put('dashboard/products/{product}',[

        'uses' => 'ProductsController@update' ,
        'as' =>'admin.product.update'


    ]); 

    //display Orders 

    Route::get('dashbaord/orders',[
            'uses' => 'OrdersController@index',
            'as' => 'admin.orders.index'

    ]);


    //display Users 
    Route::get('dashboard/users',[
        'uses' => 'UsersController@index',
        'as' => 'admin.users.index'

    ]);
});




//categories and filters
Route::get('/categories/{category}','ProductsController@index');

Route::get('/categories/{category}/{product}',[
    'uses' => 'ProductsController@show',
    'as' => 'product.show'

]);

//

Route::prefix('cart')->group(function(){

        Route::get('/add/{product}',[
            'uses' => 'CartsController@addProduct',
            'as' => 'product.add'
        ]);

        Route::get('/show',[

            'uses' => 'CartsController@show',
            'as' => 'shopping.cart'

        ]);

        Route::get('/reduce/{id}',[
            'uses'=> 'CartsController@getReduceByOne',
            'as' => 'product.reduceByOne'
        ]);

        Route::get('/remove/{id}',[
            'uses'=> 'CartsController@getRemoveItem',
            'as' => 'product.remove'
        ]);
        Route::get('/additem/{id}',[
            'uses'=> 'CartsController@getAddItem',
            'as' => 'product.addOneItem'
        ]);

        Route::middleware(['auth'])->group(function(){

             Route::get('/checkout',[

                'uses' => 'CartsController@checkout',
                'as' => 'checkout'
            ]);

            Route::post('/checkout',[
                    'uses' => 'CartsController@buy',
                    'as' =>'buy'
            ]);
  
        });
});