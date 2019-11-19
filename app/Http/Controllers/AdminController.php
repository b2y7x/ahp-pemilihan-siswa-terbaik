<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;
class AdminController extends Controller
{
    public function index(){
        $data = null;
        if(auth()->user()->is_admin == 1){
            $data = User::all();
        }else{
            $data = User::where('id',auth()->user()->id)->get();
        }
        return view('admin.admin')->with('data', $data);
    }
    public function destroy($id){
        if(auth()->user()->is_admin == false && auth()->user()->id != $id){
            return Redirect::back()->with('error', 'Anda tidak di izinkan menghapus admin ini !');
        }
        $destroy = User::find($id)->delete();
        return redirect()->route('admin.index')->with('success', 
        'Berhasil menghapus data admin');
    }
    public function create(){
        if(auth()->user()->is_admin == false){
            return Redirect::back()->with('error', 'Anda tidak di izinkan menambahkan admin !');
        }
        return view('admin.create');
    }
    public function store(Request $request){
        if(auth()->user()->is_admin == false){
            return Redirect::back()->with('error', 'Anda tidak di izinkan menambahkan admin !');
        }
        $admin = new User;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = str_slug($request->name);
        $admin->no_telp = $request->no_telp;
        $admin->is_admin = 0;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('admin.index')->with('success', 
        'Berhasil menghapus data admin');
    }
}
