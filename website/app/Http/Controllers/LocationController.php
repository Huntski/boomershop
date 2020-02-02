<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('location', [
            'user' => $user
        ]);
    }
}
