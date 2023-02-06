<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function destroy($id){
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()
            ->route('user.index')->with('success', 'Data has been deleted');
    }
}
