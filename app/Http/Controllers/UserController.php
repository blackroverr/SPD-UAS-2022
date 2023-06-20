<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    use HasFactory;

// function fitur super admin
    public function index()
    {
        $user = User::get();
        return view('/pages/users-layout-1', ['userList' => $user]);
    }

    public function create()
    {
        $role = Role::select('id', 'name')->get();
        return view('/pages/add-new-users', ['role' => $role]);
    }


    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'photo' => 'required|max:255',
            'password' => 'required|min:3|max:255',
            'role_id' => 'required',
            'active' => 'required'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        
        if($validatedData){
            Session::flash('status', 'success');
            Session::flash('message', 'Add New User Success');
         }
        return redirect('users-page');

    }

    public function edit(Request $request, $id)
    {
        $user = User::with('role')->findOrFail($id);
        $role = Role::where('id', '!=', $user->role_id)->get(['id', 'name']);
        return view('pages/edit-users', ['user' => $user, 'role' => $role]);   
    }

    public function update(Request $request, $id)
    {     
       $user = User::findOrFail($id);
       
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->role_id = $request->role_id;
       $user->active = $request->active;
       
       $user->save();
        
        return redirect('users-page');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user = DB::table('users')->where('id', $id)->delete();
        return back()->with('danger', 'Data Berhasil Di Hapus');
    }


// function edit profile dari admin

    function updateInfo(Request $request)
    {
        
        $user = User::find(Auth::user()->id);
        $user->update($request->all());
        return redirect('profile-page');
    }
}
