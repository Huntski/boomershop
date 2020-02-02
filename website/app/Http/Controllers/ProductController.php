<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function store()
    {

        $data = request()->validate([
            'titel' => ['required', 'string', 'max:250'],
            'photo' => ['required', 'string', 'max:250'],
            'prijs' => ['required', 'integer'],
        ]);

        $p = new Product;
        $p->titel = $data['titel'];
        $p->photo = $data['photo'];
        $p->prijs = $data['prijs'];

        $p->save();

        return redirect()->back();
    }

    public function delete()
    {
        Product::findOrFail(request('product_id'))->delete();
        return redirect()->back();
    }
}
