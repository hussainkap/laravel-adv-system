<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\User;
class RegisterController extends Controller
{
   public function register(Request $request)
{
    // Validate request
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // Create user
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Auto login after registration
    Auth::login($user);

    return redirect()->route('dashboard')->with('success', 'Registered successfully!');
}
}
