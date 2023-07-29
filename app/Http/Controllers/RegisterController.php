<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

    class RegisterController extends Controller
    {
        public function index()
        {
            return view('register', [
                'title' => 'Register'
            ]);
        }

        public function store(Request $request)
        {
            $validatedData = $request->validate([   
                'name' => 'required|max:255',
                // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5'
            ]);

            User::create($validatedData);
            return redirect('/')->with('success', 'Employee created successfully.');
        }
    }
