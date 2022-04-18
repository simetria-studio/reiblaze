<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return view('home');
    }
    public function userUpdate(Request $request, $id)
    {

        $user = User::find($id);


        if (!empty($request->input('password'))) {
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->password = Hash::make($request->input('password'));
            $user->save();
        } else {
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->save();
        }


        return redirect()->back()->with('success', 'Usuário editado com sucesso');
    }
}
