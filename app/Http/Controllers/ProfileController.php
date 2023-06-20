<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    //function update profile
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('/pages/profile-overview-2');
    }

    public function update(Request $request)
    {     
        
       $user = User::find(Auth::user()->id);
       $user->update($request->all()); 
       return back()->with('status', 'Profile updated!');
    }

    public function updatePassword(Request $request)
    {     
       $user = User::find(Auth::user()->id);
       $user->password = bcrypt($request->password);
       $user->save();
       return back()->with('status', 'Password updated!');
    }
}
