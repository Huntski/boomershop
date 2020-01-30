<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Shoppingcart extends Model
{
    public function __construct()
    {
        if (isset($_COOKIE['shoppingCart'])) {
            $items = json_decode($_COOKIE['shoppingCart']);
        } else {
            $values = (object) [
                'id' => uniqid(),
                'items' => []
            ];
            setcookie('shoppingCart', json_encode($values), time() + (86400 * 30), "/");
            redirect(\Request::url());
        }
    }

    public function getCart()
    {
        $product_cookie_ids = json_decode($_COOKIE['shoppingCart'])->items;
        $cart = (object) [
            'products' => []
        ];
        foreach ($product_cookie_ids as $id) {
            $class = Product::find($id);
            if ($class) {
                $alreadyExists = false;
                foreach ($cart->products as $p) {
                    if ($p->id == $class->id)
                        $alreadyExists = true;
                }
                if (!$alreadyExists) {
                    $product = (object) [
                        'id' => $class->id,
                        'titel' => $class->titel,
                        'price' => $class->prijs,
                        'quantity' => 1
                    ];
                    array_push($cart->products, $product);
                }
            }
        }
        return $cart;
    }

    public function count() {
        return count($this->getCart()->products);
    }

    public function totalPrice() {
        $total = 0;
        foreach($this->getCart()->products as $product)
        {
            $total += $product->price;
        }
        return $total;
    }

    public function addProduct($id)
    {
        $cart = json_decode($_COOKIE['shoppingCart']);
        array_push($cart->items, $id);
        setcookie('shoppingCart', json_encode($cart), time() + (86400 * 30), "/");
        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        $cart = json_decode($_COOKIE['shoppingCart']);
        $newItemsArray = [];
        $quantity = false;

        foreach($cart->items as $key => $item)
        {
            if (!$quantity && $item == $id) {
                $quantity = true;
            } else {
                array_push($newItemsArray, $item);
            }
        }

        $cart->items = $newItemsArray;

        setcookie('shoppingCart', json_encode($cart), time() + (86400 * 30), "/");
        return redirect()->back();
    }
}
