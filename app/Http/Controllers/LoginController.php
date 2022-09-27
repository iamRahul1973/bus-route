<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($this->isAdmin()) {
            Auth::login(User::role('admin')->first());
            return redirect()->route('admin.dashboard');
        }

        if ($this->isUser()) {
            User::role('user')->first();
        }

        // Invalid Credentials !
        session()->flash('error', 'Invalid Credentials');
        return redirect('login');
    }

    private function isAdmin()
    {
        return request('username') == env('ADMIN_USERNAME') && request('password') == env('ADMIN_PASSWORD');
    }

    private function isUser()
    {
        return request('username') == env('USER_USERNAME') && request('password') == env('USER_PASSWORD');
    }
}
