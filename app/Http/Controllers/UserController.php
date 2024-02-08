<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{

    public function registerPassager(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:100'],
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $validatedData['role'] = 'passenger';
    
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/img', $imageName);
            $validatedData['profile'] = $imageName;
        }
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        try {
            User::create($validatedData);
            return redirect('/user');
        } catch (\Exception $e) {
            // Handle the exception (e.g., log or redirect with an error message)
            return redirect()->back()->withErrors(['error' => 'User registration failed.']);
        }
    }
    
    public function registerDriver(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:100'],
            'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => ['required'],
            'phone' => ['required'],
            'Num_immatriculation' => ['required'],
            'vehicle' => ['required'],
        ]);
    
        $validatedData['role'] = 'Driver';
    
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $imageName = time() . '.' . $file->extension();
            $file->storeAs('public/img', $imageName);
            $validatedData['profile'] = $imageName;
        }
    
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        try {
            User::create($validatedData);
            return redirect('/user');
        } catch (\Exception $e) {
            // Handle the exception (e.g., log or redirect with an error message)
            return redirect()->back()->withErrors(['error' => 'Driver registration failed.']);
        }
    }
    








        //   public function registerPassager(Request $request)
        //   {
        //       $validatedData = $request->validate([
        //           'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
        //           'email' => ['required', 'email', Rule::unique('users', 'email')],
        //           'password' => ['required', 'min:8', 'max:100'],
        //           'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //       ]);
          
        //       $validatedData['role'] = 'passenger';
          
        //       if ($request->hasFile('profile')) {
        //           $file = $request->file('profile');
        //           $imageName = time() . '.' . $file->extension();
        //           $file->storeAs('public/images', $imageName);
        //           $validatedData['profile'] = $imageName;
        //       }
          
        //       $validatedData['password'] = Hash::make($validatedData['password']);
          
        //       try {
        //           User::create($validatedData);
        //           return redirect('/user');
        //       } catch (\Exception $e) {
        //           // Handle the exception (e.g., log or redirect with an error message)
        //           return redirect()->back()->withErrors(['error' => 'User registration failed.']);
        //       }
        //   }
          
        //   public function registerDriver(Request $request)
        //   {
        //       $validatedData = $request->validate([
        //           'name' => ['required', 'min:3', 'max:255', Rule::unique('users', 'name')],
        //           'email' => ['required', 'email', Rule::unique('users', 'email')],
        //           'password' => ['required', 'min:8', 'max:100'],
        //           'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //           'description' => ['required'],
        //           'phone' => ['required'],
        //           'Num_immatriculation' => ['required'],
        //           'vehicle' => ['required'],
        //       ]);
          
        //       $validatedData['role'] = 'Driver';
          
        //       if ($request->hasFile('profile')) {
        //           $file = $request->file('profile');
        //           $imageName = time() . '.' . $file->extension();
        //           $file->storeAs('public/images', $imageName);
        //           $validatedData['profile'] = $imageName;
        //       }
          
        //       $validatedData['password'] = Hash::make($validatedData['password']);
          
        //       try {
        //           User::create($validatedData);
        //           return redirect('/user');
        //       } catch (\Exception $e) {
        //           // Handle the exception (e.g., log or redirect with an error message)
        //           return redirect()->back()->withErrors(['error' => 'Driver registration failed.']);
        //       }
        //   }
          
  
}
