<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        return 'Hello from UserController';
    }

    public function login()
    {
        if (FacadesView::exists('user.login')) {
            return view('user.login');
        } else {
            return abort(404);
            // return response()->view('errors.404');
        }
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Welcome back!');
        }
        return back()->withErrors(['email' => 'Login failed'])->onlyInput('email');
    }

    public function register()
    {
        return view('user.register');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout successfull');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);
        auth()->login($user);
        return redirect('/')->with('message', 'Account created successfully!');
        // auth()->login($user);
    }

    public function show($id)
    {
        $data = ["data" => "data from database"];
        return view('user')
            ->with('data', $data)
            ->with('name', 'Kodego SP404 Class')
            ->with('age', '19')
            ->with('email', 'sp404@kodego.com.ph')
            ->with('id', $id);
    }
      
    // ricafrente search filter
   /*  public function search(Request $request)
    {
       $data = User::when($request->first_name, function($query) use ($request) {
          return $query->where('first_name', 'like', '%'.$request->first_name.'%');
       })
       ->when($request->last_name, function($query) use ($request) {
          return $query->where('last_name', 'like', '%'.$request->last_name.'%');
       })
       ->when($request->email, function($query) use ($request) {
          return $query->where('email', 'like', '%'.$request->email.'%');
       })
       ->when($request->age, function($query) use ($request) {
          return $query->where('age', $request->age);
       })->get();
    
       return view('search', compact('data'));
    } */
    // ricafrente search filter
    
}
