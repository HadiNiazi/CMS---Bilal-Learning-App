<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // $user = auth()->user();

        // $userId = auth()->id();


        // $usersCount = User::where('id', '!=', $userId)->count();

        $usersCount = User::count();
        // $postsCount =


        return view('admin.dashboard', compact('usersCount'));
    }

    public function logout()
    {
        auth()->logout();

        return to_route('login');
    }

    public function profile()
    {
        $user = auth()->user();

        return view('admin.profile', compact('user'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        $user = auth()->user();

        if (! $request->password) {

            $user->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

        }
        else {

            // if ()

        }
    }
}
