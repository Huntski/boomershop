<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        return view('account');
    }

    public function edit()
    {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'telefoonnummer' => ['nullable', 'string'],
            'postcode' => ['nullable', 'string'],
            'huisnummer' => ['nullable', 'string'],
            'toevoegingen' => ['nullable', 'string'],
        ]);

        $user = auth()->user();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->telefoonnummer = $data['telefoonnummer'];
        $user->postcode = $data['postcode'];
        $user->huisnummer = $data['huisnummer'];
        $user->toevoegingen = $data['toevoegingen'];
    }
}
