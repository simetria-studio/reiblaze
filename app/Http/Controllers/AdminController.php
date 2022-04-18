<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mails;
use App\Mail\UserMail;
use App\Models\Scrap;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Facebook\WebDriver\Cookie;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverExpectedCondition;

class AdminController extends Controller
{
    public function index()
    {
        return view('adm');
    }

    public function storeUser(Request $request)
    {

        $random = Str::random(10);

        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($random)
        ]);

        $mails = new Mails();
        $mails['name'] = $request->name;
        $mails['email'] = $request->email;
        $mails['password'] = $random;

        Mail::to($request->email)->send(new UserMail($mails));
        return redirect()->back()->with('success', 'Usuário criado com sucesso');
    }

    public function users()
    {
        $users = User::all();
        return view('users', get_defined_vars());
    }

    public function userStatus(Request $request, $id)
    {
        $user = User::find($id);
        $user->permission = $request->status;
        $user->save();

        return redirect()->back();
    }

    public function userEdit($id)
    {
        $user = User::find($id);
        return view('user-edit', get_defined_vars());
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
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }


    public function webDriver(Request $request)
    {
        $dados =  $request->all();
        $number = 0;
        $date = Scrap::where('created_at', '>', date('Y-m-d H:i:s', strtotime('-33 seconds')))->where('number', $dados[0]['number'])->where('class_name', $dados[0]['class_name'])->get();

        if ($date->count() == 0) {
            if ($dados[0]['number'] !== null) {
                $number = 1;
                Scrap::create([
                    'number' => $dados[0]['number'],
                    'class_name' => $dados[0]['class_name'],
                ]);
            } else {
                Scrap::create([
                    'number' => $dados[0]['number'],
                    'class_name' => $dados[0]['class_name'],
                ]);
            }
        }
    }

    public function getDados()
    {
        $scraps = Scrap::latest('id')->limit(1)->get();

        return response()->json($scraps);
    }

    public function getClass()
    {

        $black = Scrap::select('class_name')->where('class_name', 'black')
            ->get()->count();
        $red = Scrap::select('class_name')->where('class_name', 'red')
            ->get()->count();
        $white = Scrap::select('class_name')->where('class_name', 'white')
            ->get()->count();

        $total = $black + $red + $white;
        $v1 = ($black / $total) * 100;
        $v2 = ($red / $total) * 100;
        $v3 = ($white / $total) * 100;
        $totalP = $v1 + $v2 + $v3;
        return response()->json(get_defined_vars());
    }
}
