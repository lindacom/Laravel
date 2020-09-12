<?php

namespace App;

class Cart 
{
    public $items = null; //items are grouped in the item array
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if ($oldCart) { //if a cart already exists get the cart details
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;

        }
    }

     public function add($item, $id) { //add items to cart by id
        // store a new item in the storedItems array    
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' =>$item];
                if ($this->items) { //if the item already exists
           if (array_key_exists($id, $this->items)) {
               $storedItem = $this->items[$id];
           }
        }

        $storedItem['qty']++; //increase the quantity by one
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
     }

     public function reduceByOne($id) {
         $this->items[$id]['qty']--;
         $this->items[$id]['price']-= $this->items[$id]['item']['price'];
         $this->totalQty--;
         $this->totalPrice -= $this->items[$id]['item']['price'];
    
         // if the number of items in cart is less than or equal to o
         //remove item from cart
    if ($this->items[$id]['qty'] <=0) {
        unset($this->items[$id]);
    }
        }

public function increaseByOne($id) {
         $this->items[$id]['qty']++;
         $this->items[$id]['price']+= $this->items[$id]['item']['price'];
         $this->totalQty++;
         $this->totalPrice += $this->items[$id]['item']['price'];
    
         // if the number of items in cart is less than or equal to o
         //remove item from cart
    if ($this->items[$id]['qty'] <=0) {
        unset($this->items[$id]);
    }
        }

        public function removeItem($id) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['price'];
            unset($this->items[$id]);
        }
    }

