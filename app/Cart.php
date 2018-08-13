<?php

namespace App;


class Cart
{
        public $items = null ;  

        public $totalQuantity = 0 ; 

        public $totalPrice = 0.0 ; 

    public function __construct($oldCart)
    {
        if($oldCart)
        {
            $this->items = $oldCart->items ; 

            $this->totalQuantity = $oldCart->totalQuantity ; 

            $this->totalPrice = $oldCart->totalPrice ; 
        }

    }

    public function add($item){
        $storedItem = ['quantity' => 0, 'price' =>$item->price  , 'item' => $item ];

        if($this->items){
            if(array_key_exists($item->id,$this->items)){

                $storedItem = $this->items[$item->id]; 

            }             
        }

        //Increase the item Quantity 

        $storedItem['quantity']++  ; 

        //Calculate The Item Price 

        $storedItem['price'] = $item->price * $storedItem['quantity'] ; 


        //Increase The Total Quantity 

        $this->totalQuantity++ ; 


        //Increase the total Price 

        $this->totalPrice += $item->price ; 

        $this->items[$item->id] = $storedItem ; 

    }
    // from cart reduce by one items.
    public function ReduceByOne($id)
    {   
        // reduce quantity this item form cart
        $this->items[$id]['quantity']--;

        //reduce  total price this item 

        $this->items[$id]['price'] -=$this->items[$id]['item']['price'];

        $this->totalQuantity--;
        
        $this->totalPrice -= $this->items[$id]['item']['price'];

        //To ensure that the quantity is not reduced less than zero

        if($this->items[$id]['quantity'] <= 0)
        {
            unset($this->items[$id]);
        }
    } 
    // remove item 
    public function removeItem($id)
    {
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

    ////add one item thourgh cart
    public function ADDByOne($id)
    {   
        // add quantity this item form cart
        $this->items[$id]['quantity']++;

        //add total price this item 

        $this->items[$id]['price'] +=$this->items[$id]['item']['price'];
        $this->totalQuantity++;
        $this->totalPrice += $this->items[$id]['item']['price'];

        

        
    } 
    
}
