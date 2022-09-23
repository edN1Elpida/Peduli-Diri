<?php

namespace App\Http\Controllers;

use App\Models\Perjalanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function duser(){
        $data = User::paginate(8);
        return view('user.duser',compact('data'));
    }

    public function view($id){
        $data = User::find($id);
        return view('user.euser',compact('data'));
    }

    public function update(Request $request, $id){
        $data = User::find($id);
        $data->update($request->all());
        return redirect('duser');
    }

    public function destroy($id){
        $data = User::find($id);
        $data->delete();
        return redirect('duser');
    }

    public function dpuser($id){
        $user = User::find($id);
        $data = Perjalanan::where('user_id',$user->id)->paginate(5);
        return view('user.dpuser', compact('data'));
    }
}
